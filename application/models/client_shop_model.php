<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Client_Shop_Model extends CI_Model {

    function Client_Shop_Model()
    {
        parent::__construct();
    }

    public static function  get_normal_registr($str)
    {


        $lower = mb_strtolower ($str, 'UTF-8');
        $str_len = mb_strlen($lower, 'UTF-8');
        return mb_strtoupper(mb_substr($lower,0,1),'UTF-8').mb_substr($lower,1,$str_len-1, 'UTF-8');
    }

    function getParentCategoryList()
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');
        $this->db->where('sub_category_id', NULL);
        $this->db->where('category_enabled', '1');

        $query = $this->db->get();
        return $query->result();
    }

    function getParentCategoryById($parent_id)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->where('parent_category_id', $parent_id);
        $this->db->where('sub_category_id', NULL);

        $query = $this->db->get();
        $results =  $query->result();
        return $results[0];
    }

    function getSubCategoryList()
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');
        $this->db->where('sub_category_id !=', 'NULL');
        $this->db->where('category_enabled', '1');

        $query = $this->db->get();
        return $query->result();
    }

    function getSubCategoryById($parent_id)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');
        $this->db->where('parent_category_id', $parent_id);
        $this->db->where('sub_category_id !=', 'NULL');
        $this->db->where('category_enabled', '1');

        $query = $this->db->get();
        return $query->result();
    }

    function getParentCategoryAjax($parent_id)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->select('category_name, parent_category_url');
        $this->db->where('parent_category_id', $parent_id);
        $this->db->where('sub_category_id', NULL);

        $query = $this->db->get();
        return $query->result();
    }

    function getSubCategoryAjax($parent_id)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->select('category_name, parent_category_url, sub_category_url');
        $this->db->order_by('id', 'asc');
        $this->db->where('parent_category_id', $parent_id);
        $this->db->where('sub_category_id !=', 'NULL');
        $this->db->where('category_enabled', '1');

        $query = $this->db->get();
        return $query->result();
    }


    function getPageContent($page_url)
    {
        $tbl_name = 'pages';

        $this->db->from($tbl_name);
        $this->db->where('page_url', $page_url);

        $query = $this->db->get();
        return $query->result();
    }

    function getNews()
    {
        $tbl_name = 'news';

        $this->db->from($tbl_name);
        $this->db->select('id,title,title_url,preview,news_date');
        $this->db->where('enabled', 1);
        $this->db->order_by('news_date', 'desc');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function getLastNews($cnt)
    {
        $tbl_name = 'news';

        $this->db->from($tbl_name);
        $this->db->select('id,title,title_url,preview,news_date');
        $this->db->where('enabled', 1);
        $this->db->limit($cnt);
        $this->db->order_by('news_date', 'desc');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function getNewsPage($page_url)
    {
        $tbl_name = 'news';

        $this->db->from($tbl_name);
        $this->db->where('title_url', $page_url);
        $this->db->where('enabled', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $new_page = $query->result();
        return $new_page[0];
    }


    function getArticles()
    {
        $tbl_name = 'articles';

        $this->db->from($tbl_name);
        $this->db->where('enabled', 1);
        $this->db->order_by('id', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    function getNextArticles($id, $cnt)
    {
        $start_id=$id;
        $articles = array();

        $tbl_name = 'articles';
        //выбрать следующие $cnt статей после $id
        //если конец, то выбирать, начиная с первой
        while (count($articles)<$cnt)
        {
        $this->db->from($tbl_name);
        $this->db->select('id,title,title_url');
        $this->db->where('enabled', 1);
        $this->db->where('id >', $start_id);
        $this->db->limit($cnt);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $result = $query->result();
        foreach($result as $next_article)
        {
            array_push($articles, $next_article);
        }
        $start_id = 1;
        }
        return $articles;
    }

    function getArticle($page_url)
    {
        $tbl_name = 'articles';

        $this->db->from($tbl_name);
        $this->db->where('title_url', $page_url);
        $this->db->where('enabled', 1);
        $this->db->limit(1);

        $query = $this->db->get();
        $articles = $query->result();
        return $articles[0];
    }

    function getParentCategoryByUrl($parent_category_url)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->where('parent_category_url', $parent_category_url);
        $this->db->where('sub_category_id', NULL);


        $query = $this->db->get();
        return $query->result();
    }

    function getSubCategoryByUrl($sub_category_url)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->where('sub_category_url', $sub_category_url);

        $query = $this->db->get();
        return $query->result();
    }

    function getProductByUrlAndCategoryId($product_url,$category_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->where('product_url', $product_url);
        $this->db->where('category_id', $category_id);
        $this->db->where('product_enabled', 1);

        $query = $this->db->get();
        return $query->result();
    }


    function getCategoryById($category_id)
    {
        $tbl_name = 'category';

        $this->db->from($tbl_name);
        $this->db->where('sub_category_id', $category_id);

        $query = $this->db->get();
        $results = $query->result();
        return $results[0];
    }

    function getProductsList()
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);

        $query = $this->db->get();
        return $query->result();
    }

    function getProductsEnabledList()
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->where('product_enabled', 1);

        $query = $this->db->get();
        return $query->result();
    }

    function getProductsAutoCompleteList()
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->select('product_name');
        $this->db->where('product_enabled', 1);

        $query = $this->db->get();
        return $query->result();
    }

    function getNoveltyList($limit=0)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->order_by('product_id', 'desc');
        $this->db->where('product_enabled', 1);
        $this->db->where('product_new', 1);
        if ($limit>0) $this->db->limit($limit);

        $query = $this->db->get();
        return $query->result();
    }

    function getSaleList($limit=0)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        //$this->db->join('');


        $this->db->order_by('product_id', 'desc');
        $this->db->where('product_enabled', 1);
        $this->db->where('product_sale', 1);
        if ($limit>0) $this->db->limit($limit);

        $query = $this->db->get();
        return $query->result();
    }

    function getSaleStatusById($product_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->where('product_enabled', 1);
        $this->db->where('product_sale', 1);
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();
        return $query->result();
    }

    function getNewStatusById($product_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->where('product_enabled', 1);
        $this->db->where('product_new', 1);
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();
        return $query->result();
    }

    function getProductsByCategoryId($category_id, $category_type=0)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->order_by('product_new', 'desc');
        $this->db->order_by('product_sort_id', 'asc');
        $this->db->where('product_enabled', 1);
        $this->db->where('category_id', $category_id);
        if ($category_type>0) {
            $this->db->or_where('category_id', 30+$category_type);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getProductsForSubCategory($category_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->order_by('product_new', 'desc');
        $this->db->order_by('product_sort_id', 'asc');
        $this->db->where('category_id', $category_id);
        $this->db->where('product_enabled', 1);
        $this->db->limit(3);

        $query = $this->db->get();
        return $query->result();
    }


    function getColorsList()
    {
        $tbl_name = 'color';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');

        $query = $this->db->get();
        return $query->result();
    }
    function getColorsListByListId($list_id, $prod_id)
    {
        $reverse = $this->needReverse($prod_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'color';
        $tbl_name2 = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->join($tbl_name2, 'shop_products.shop_product_color = color.id');
        $this->db->where('shop_products.shop_product_enabled', 1);
        $this->db->where('product_id', $prod_id);
        if (count($list_id)>0) $this->db->where_in('id',$list_id);

        $this->db->order_by('shop_products.shop_product_price', $order_by);

        $query = $this->db->get();
        return $query->result();
    }



    function getPagesContent()
    {
        $tbl_name = 'pages';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    function getPagesContentbyId($page_id)
    {
        $tbl_name = 'pages';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');
        $this->db->where_in('id', $page_id);

        $query = $this->db->get();
        return $query->result();
    }

    function updateCurrentPage($update_data)
    {
        $upd = array(
            'page_content' => $update_data['page_content']
        );

        $tbl_name = 'pages';

        $this->db->where('id', $update_data['id']);
        $this->db->update($tbl_name, $upd);
    }

    function getProductsByCategoryIdAdmin($category_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->order_by('product_new', 'desc');
        $this->db->order_by('product_sort_id', 'asc');
        $this->db->where('category_id', $category_id);


        $query = $this->db->get();
        return $query->result();
    }

    function getProductColorsById($product_id)
    {
        $reverse = $this->needReverse($product_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->select('shop_product_color');
        $this->db->where('shop_product_enabled', 1);
        $this->db->group_by('shop_product_color');
        $this->db->where('product_id', $product_id);
        $this->db->order_by('shop_products.shop_product_price', $order_by);


        $query = $this->db->get();
        return $query->result();
    }


    function getProductSpecsList()
    {
        $tbl_name = 'products_spec_array';

        $this->db->from($tbl_name);

        $query = $this->db->get();
        return $query->result();
    }

    function getProductSpecsById($product_id)
    {
        $tbl_name = 'products_spec_array';

        $this->db->from($tbl_name);
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        return $query->result();
    }

    function productUpdateMainData($update_data)
    {
        $tbl_name = 'products';

        $this->db->where('product_id', $update_data['product_id']);
        $this->db->update($tbl_name, $update_data);
    }

    function productUpdateColorData($update_data)
    {
        $tbl_name = 'products_color_array';

        $this->db->where('product_id', $update_data['product_id']);
        $this->db->update($tbl_name, $update_data);
    }

    function productUpdateSpecsData($update_data)
    {
        $tbl_name = 'products_spec_array';

        $this->db->where('product_id', $update_data['product_id']);
        $this->db->update($tbl_name, $update_data);
    }

    function getShopProductsByIdAdmin($product_id)
    {
        $reverse = $this->needReverse($product_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->where('product_id', $product_id);
        $this->db->where('shop_product_enabled', 1);

        $this->db->order_by('shop_product_price', $order_by);
        $query = $this->db->get();
        return  $this->addTaxToQuery($query->result(), $product_id);
    }

    function getShopProductFirstPrice($product_id)
    {
        $reverse = $this->needReverse($product_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->order_by('shop_product_id', 'asc');
        $this->db->where('shop_product_enabled', 1);
        $this->db->order_by('shop_product_price', $order_by);
        $this->db->where('product_id', $product_id);
        $this->db->limit(1);

        $query = $this->db->get();
        return  $this->addTaxToQuery($query->result(), $product_id);
    }

    function getShopProductById($product_id)
    {
        $reverse = $this->needReverse($product_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->order_by('shop_product_price', $order_by);
        $this->db->where('product_id', $product_id);
        $this->db->where('shop_product_enabled', 1);

        $query = $this->db->get();
        return  $this->addTaxToQuery($query->result(), $product_id);
    }
    function addTaxToQuery($res, $product_id)
    {
        foreach ($res as $item)
        {
            $item->shop_product_price = $this->getPriceWithTax($item->shop_product_price, $product_id);
        }
        return $res;
    }

    function getTaxSmart($prod_tax, $sub_cat_tax, $par_cat_tax)
    {
        /*echo $prod_tax." prod_tax <br><br>";
        echo $sub_cat_tax." sub_cat_tax <br><br>";
        echo $par_cat_tax." par_cat_tax <br><br>";*/
        $result = 0;//по умолчанию, наценка 35%;
        if (!empty($prod_tax))
        {$result = $prod_tax;} //наивысший приоритет - процент наценки продукта;
        else if (!empty($sub_cat_tax))
        {$result = $sub_cat_tax; }//если процент наценки продукта не указан - присваивается процент наценки подкатегории;
        else if (!empty($par_cat_tax))
        {$result = $par_cat_tax;}//если процент наценки подкатегории не указан - присваивается процент наценки родительской категории;

       /* echo "Результат ".$result."<br><br>";*/

        return $result;
    }

    function getTaxByProdId($product_id)
    {
        $product = $this->getProductById($product_id);
        $sub_category = $this->getCategoryById($product->category_id);
        $par_category = $this->getParentCategoryById($sub_category->parent_category_id);
        $prod_tax = $product->prod_tax;
        $sub_cat_tax = $sub_category->category_tax;
        $par_cat_tax = $par_category->category_tax;

        $item_tax = $this->getTaxSmart($prod_tax, $sub_cat_tax, $par_cat_tax);
        return $item_tax;
    }



    function needReverse($product_id)
    {
        $item_tax = $this->getTaxByProdId($product_id);
        return $item_tax>50; //если наценка больше 50% -> товар делюкс -> сортировка в карточке товаров(по цвету и спецификациям) от большей к меньшей
    }


    function getPriceWithTax($shop_product_price, $product_id)
    {
        $item_tax = $this->getTaxByProdId($product_id);

        $item_price = $shop_product_price;

        $item_tax = $item_tax/100;

        $full_item_price = ceil( $item_price * (1+$item_tax));

        return $full_item_price;

    }


    function addShopProductByIdAdmin($shop_product_data)
    {
        $tbl_name = 'shop_products';

        $this->db->insert($tbl_name, $shop_product_data);

    }

    function updateDataShopProductByIdAdmin($shop_product_data)
    {
        $tbl_name = 'shop_products';

        $this->db->where('shop_product_id', $shop_product_data['shop_product_id']);
        $this->db->update($tbl_name, $shop_product_data);

    }

    function getShopProductsSpecs()
    {
        $tbl_name = 'shop_products_spec_list';

        $this->db->from($tbl_name);
        $this->db->order_by('spec_id', 'asc');

        $query = $this->db->get();
        return  $query->result();

    }

    function getShopProductsSpecsByListId($list_id, $prod_id)
    {
        $reverse = $this->needReverse($prod_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products_spec_list';
        $tbl_name2 = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->join($tbl_name2, 'shop_products.shop_product_spec = shop_products_spec_list.spec_id');
        $this->db->where('product_id', $prod_id);
        $this->db->where_in('shop_products_spec_list.spec_id', $list_id);
        $this->db->where('shop_products.shop_product_enabled', 1);

        $this->db->order_by('shop_products.shop_product_price', $order_by);

        $query = $this->db->get();
        return $query->result();

    }

    function insertMigrateProduct($migrate_data)
    {
        $tbl_name = 'products_migrates';

        $this->db->insert($tbl_name, $migrate_data);
    }

    function insertMigrateProductSpecs($migrate_data)
    {
        $tbl_name = 'products_migrates_specs';

        $this->db->insert($tbl_name, $migrate_data);
    }

    function getMigrateData()
    {
        $tbl_name = 'products_migrates_specs';

        $this->db->from($tbl_name);
        $this->db->order_by('id', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    function getProductSpecsListById($product_id)
    {
        $tbl_name = 'products_spec_array';

        $this->db->from($tbl_name);
        $this->db->select('shop_products_spec_array');
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();
        return $query->result();
    }

    function updateMigrateProductColors($migrate_data, $product_id)
    {
        $tbl_name = 'products_color_array';

        $this->db->where('product_id', $product_id);
        $this->db->update($tbl_name, $migrate_data);
    }

    function updateMigrateProductSpecs($migrate_data, $product_id)
    {
        $tbl_name = 'products_spec_array';

        $this->db->where('product_id', $product_id);
        $this->db->update($tbl_name, $migrate_data);
    }

    function getShopProductPrice($shop_product_data)
    {
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->where('product_id', $shop_product_data['product_id']);
        $this->db->where('shop_product_color', $shop_product_data['shop_product_color']);
        $this->db->where('shop_product_spec', $shop_product_data['shop_product_spec']);
        $this->db->where('shop_product_enabled', 1);

        $query = $this->db->get();
        return  $this->addTaxToQuery($query->result(), $shop_product_data['product_id']);
    }

    function  getShopProductPriceById($product_id)
    {
        $reverse = $this->needReverse($product_id);
        $order_by = 'ASC';
        if ($reverse) {$order_by = 'DESC';}
        $tbl_name = 'shop_products';

        $this->db->from($tbl_name);
        $this->db->select('shop_product_price');
        $this->db->where('product_id', $product_id);
        $this->db->where('shop_product_enabled', 1);
        $this->db->order_by('shop_product_price', $order_by);
        $this->db->limit(1);

        $query = $this->db->get();
        return  $this->addTaxToQuery($query->result(), $product_id);
    }



    function SendToIcq($message)
    {
        /*include('WebIcqLite.class.php');

        define('UIN', 650528358);

        define('PASSWORD', 'mes2nora');

        $icq = new WebIcqLite();

        if($icq->connect(UIN, PASSWORD)){

            if(!$icq->send_message('663350591', $message)){

                //echo $icq->error;

            }else{

                //echo 'Message sent';

            }
            if(!$icq->send_message('682392434', $message)){

                //echo $icq->error;

            }else{

                //echo 'Message sent';

            }



            $icq->disconnect();

        }else{

            //echo $icq->error;

        }
*/
    }

    function insertClientCartLog($client_data)
    {
        $tbl_name = 'client_cart_log';

        $this->db->insert($tbl_name, $client_data);
    }

    function insertCallback($callback_data)
    {
        $tbl_name = 'callbacks';

        $this->db->insert($tbl_name, $callback_data);
    }

    function getRelatedProducts($current_product_id, $current_sub_category_id)
    {
        $tbl_name = 'products';

        $this->db->from($tbl_name);
        $this->db->order_by('product_new', 'desc');
        $this->db->order_by('product_sort_id', 'asc');
        $this->db->where('category_id', $current_sub_category_id);
        $this->db->where('product_id !=', $current_product_id);
        $this->db->where('product_enabled', 1);
        $this->db->limit(8);

        $query = $this->db->get();
        return $query->result();
    }

    function createCaptcha()
    {
        function generate_captcha()
        {
            $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z','1','2','3','4','5','6','7','8','9','0','$','+',')','(','%','#','!','&','@');

            $pass = "";

            $number = 6;

            for($i = 0; $i < $number; $i++)
            {
                $index = mt_rand(0, count($arr) - 1);

                $pass .= $arr[$index];
            }

            return $pass;
        }

        $captcha_token = generate_captcha();

        $captcha = array(
            'word'       => $captcha_token,
            'img_path'   => './captcha/',
            'img_url'  => base_url().'captcha/',
            'font_path'  => './fonts/font.ttf',
            'img_width'  => '150',
            'img_height' => '26',
            'expiration' => '120',
            'time'       => time()
        );



        //captcha array for db
        $value = array(
            'time'       => $captcha['time'],
            'ip_address' => $this->input->ip_address(),
            'word'       => $captcha['word']
        );

        //kill when expire

        $exipre = $captcha['time'] - $captcha['expiration'];

        $this->db->where('time < ', $exipre);
        $this->db->delete('captcha');

        //insert in db
        $this->db->insert('captcha', $value);

        $img = create_captcha($captcha);

        return $img['image'];
    }

    function checkCaptcha($q)
    {
        $table_name = 'captcha';

        $this->db->from($table_name);
        $this->db->order_by('id', 'asc');
        $query = $this->db->where_in('word',$q)->get();

        return $query->result();

    }

    function getProductByIdForSearch($ids = array())
    {
        $table_name = 'products';

        $this->db->from($table_name);
        $this->db->order_by('product_id', 'asc');
        $query = $this->db->where_in('product_id',$ids)->get();

        return $query->result();
    }


    function getProductById($id)
    {
        $table_name = 'products';

        $this->db->from($table_name);
        $this->db->limit(1);
        $query = $this->db->where('product_id',$id)->get();
        $results = $query->result();
        return $results[0];
    }

    function setUserProductView($user_product_view_data)
    {
        $table_name = 'user_product_view';

        $this->db->insert($table_name, $user_product_view_data);

        return true;

    }

    function setProductBookmark($user_product_view_data)
    {
        $table_name = 'user_product_bookmarks';

        $this->db->insert($table_name, $user_product_view_data);

        return true;

    }

    function setCollateProduct($product_collate_data)
    {
        $table_name = 'user_product_collate';

        $this->db->insert($table_name, $product_collate_data);

        return true;

    }


    function getUserProductView($user_session_id)
    {
        $table_name = 'user_product_view';


        $this->db->from($table_name);
        $this->db->order_by('datetime', 'desc');
        $this->db->where('user_session_id', $user_session_id);

        $query = $this->db->get();
        return $query->result();

    }

    function getProductBookmarks($user_session_id)
    {
        $table_name = 'user_product_bookmarks';


        $this->db->from($table_name);
        $this->db->order_by('datetime', 'desc');
        $this->db->where('user_session_id', $user_session_id);

        $query = $this->db->get();
        return $query->result();

    }

    function getCollateData($user_session_id)
    {
        $table_name = 'user_product_collate';


        $this->db->from($table_name);
        $this->db->order_by('datetime', 'desc');
        $this->db->where('user_session_id', $user_session_id);

        $query = $this->db->get();
        return $query->result();

    }

    function getProductsReviews($product_id)
    {
        $table_name = 'products_reviews';


        $this->db->from($table_name);
        $this->db->order_by('datetime', 'desc');
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();
        return $query->result();

    }

    function getCollateStatus($status_data)
    {
        $table_name = 'user_product_collate';


        $this->db->from($table_name);
        $this->db->where('user_session_id', $status_data['user_session_id']);
        $this->db->where('product_id', $status_data['product_id']);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->result();

        if(empty($result))
        {

            return false;

        }
        else
        {
            return true;
        }

    }

    function getBookmarksStatus($status_data)
    {
        $table_name = 'user_product_bookmarks';


        $this->db->from($table_name);
        $this->db->where('user_session_id', $status_data['user_session_id']);
        $this->db->where('product_id', $status_data['product_id']);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->result();

        if(empty($result))
        {

            return false;

        }
        else
        {
            return true;
        }

    }

    function addProductReview($review_data)
    {
        $table_name = 'products_reviews';

        $this->db->insert($table_name, $review_data);

        return true;
    }

}