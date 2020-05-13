<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Db_admin_model extends CI_Model
{
    function Db_admin_model()
    {
        parent::__construct();
    }


    function translitIt($str)
    {
        $tr = array(
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
            "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=>"_",","=>"","/"=>"_","№"=>"n","."=>"","-"=>"",
            "("=>"",")"=>"","'"=>"","\"" =>"","="=>""
        );
        return strtr($str,$tr);
    }

    /*get сategory data*/
    function getCategoryData()
    {
        $table_name = 'category_l';

        $this->db->from($table_name);
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();

        return $query->result();
    }

    function getCategoryById($cat_id)
    {
        $table_name = 'category_l';

        $this->db->from($table_name);
        $this->db->where('category_id', $cat_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }


    function getColorsList()
    {
        $table_name = 'color';

        $this->db->from($table_name);
        $this->db->order_by('color_name', 'asc');
        $query = $this->db->get();

        return $query->result();
    }


    function getColorsDict()
    {
        $colors_list = $this->getColorsList();

        foreach($colors_list as $color)
        {
            $result[$color->id] = $color->color_name;
        }

        return $result;
    }


    function getColorsListByArray($id_array)
    {
        $table_name = 'color';

        $this->db->from($table_name);
        $this->db->order_by('color_name', 'asc');
        $this->db->where_in('id', $id_array);
        $query = $this->db->get();

        return $query->result();
    }

    function getShopListByArray($id_array)
    {
        $table_name = 'shop';

        $this->db->from($table_name);
        $this->db->order_by('id', 'asc');
        $this->db->where_in('id', $id_array);
        $query = $this->db->get();

        return $query->result();
    }

    function getCatalogCategoryName()
    {
        $table_name = 'view_catalog';

        $this->db->from($table_name);
        $this->db->where('enabled', '1');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();

        return $query->result();
    }

    function getNewSortIdInCategory($CategoryId)
    {
        $table_name = 'products_l';

        $this->db->from($table_name);
        $this->db->where('category_id', $CategoryId);
        $this->db->order_by('sort_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        $prod_max_sort_id = $query->result(); //продукт из категории "category_id" с максимальной сортировкой

        return $prod_max_sort_id[0]->sort_id+1;
    }

    function getLastProduct()
    {
        $table_name = 'products_l';

        $this->db->from($table_name);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }

    function getLastLinksColor()
    {
        $table_name = 'links_colors';

        $this->db->from($table_name);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }

    function getLinksColorsIdByProdId($prod_id)
    {
        $table_name = 'links_colors';

        $this->db->from($table_name);
        $this->db->where('prod_id', $prod_id);
        $this->db->limit(1);
        $query = $this->db->get();

        $LinksColor = $query->result();
        return $LinksColor[0]->id;
    }

    function getLinksSpecsIdByProdId($prod_id)
    {
        $table_name = 'links_specs';

        $this->db->from($table_name);
        $this->db->where('prod_id', $prod_id);
        $this->db->limit(1);
        $query = $this->db->get();

        $LinksSpecs = $query->result();
        return $LinksSpecs[0]->id;
    }

    function getLastLinksSpecs()
    {
        $table_name = 'links_specs';

        $this->db->from($table_name);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->result();
    }


    function getShopSpecsByColorAndSpecsArray($prod_id, $color_array, $specs_array)
    {
        $table_name = 'shop_specs';

        $this->db->from($table_name);
        $this->db->order_by('id', 'asc');
        $this->db->where('prod_id', $prod_id);
        $this->db->where_in('color', $color_array);
        $this->db->where_in('spec', $specs_array);
        $query = $this->db->get();

        return $query->result();
    }

    function getNomencListByArray($id_array)
    {
        $table_name = 'shop_specs_list';

        $this->db->from($table_name);
        $this->db->order_by('id', 'asc');
        $this->db->where_in('id', $id_array);
        $query = $this->db->get();

        return $query->result();
    }

    function AddProduct($add_product)
    {

        /* insert to table 'products_l' */

        $cat_id = $add_product['category_id'];
        $sort_id = $this->getNewSortIdInCategory($cat_id);

        $product = array(
            'category_id' => $cat_id,
            'product_name' => $add_product['product_name'],
            'product_short_name' => $add_product['product_short_name'],
            'description' => $add_product['description'],
            'search_tags' => $add_product['search_tags'],
            'translit' => $add_product['translit'],
            'sort_id' =>  $sort_id,
            'enabled' => 1
        );
        $this->db->insert('products_l', $product);
        $product_id = $this->db->insert_id(); //inserted_product_id


        /* insert to table 'links_specs' */
        $lastLinksSpecs = $this->getLastLinksSpecs();
        $newLinksSpecsId = $lastLinksSpecs[0]->id+1;

        $links_specs =  array(
            'id' => $newLinksSpecsId,
            'prod_id' => $product_id
        );
        $this->db->insert('links_specs', $links_specs);

        $shop_specs_array = array();

        // insert to table 'shop_specs_list' and to form shop_specs_array as id's array
        foreach($add_product['shop_specs'] as $shop_specs)
        {
            $shop_specs_data = array(
                'spec_name' => $shop_specs
            );
            $this->db->insert('shop_specs_list', $shop_specs_data);
            array_push($shop_specs_array, $this->db->insert_id());
        }

        /* insert to table 'specs_array' */
        $specs_array = array(
            'id' =>  $newLinksSpecsId,
            'prod_id' =>  $product_id,
            'name_specs_array' => $add_product['name_specs_array'],
            'specs_array' => $add_product['specs_array'],
            'double_cat_id' => NULL,
            'double_prod_id' => NULL,
            'new' => 1,
            'sale' => 0,
            'shop_specs_array' =>implode(',',$shop_specs_array)
        );
        $this->db->insert('specs_array', $specs_array);



        /* insert to table 'links_colors' */
        $lastLinksColor = $this->getLastLinksColor();
        $newLinksColorId = $lastLinksColor[0]->id+1;

        $links_colors =  array(
            'id' => $newLinksColorId,
            'prod_id' => $product_id
        );
        $this->db->insert('links_colors', $links_colors);



        /* insert to table 'colors_array' */
        $colors_array = array(
            'id' => $newLinksColorId ,
            'prod_id' =>  $product_id,
            'color_array' => $add_product['color_array']
        );

        $this->db->insert('colors_array', $colors_array);



    }




    function updateProductById($product_data, $prod_id)
    {

        /* update table 'products_l' */
        $product = array(
            'category_id' =>  $product_data['category'],
            'product_name' => $product_data['product_name'],
            'product_short_name' => $product_data['product_short_name'],
            'description' => $product_data['description'],
            'search_tags' => $product_data['search_tags'],
            'translit' => $product_data['translit'],
            'sort_id' =>  $product_data['sort_id'],
            'enabled' => 1
        );
        $table_name = 'products_l';
        $this->db->where('id', $prod_id);
        $this->db->update($table_name, $product);


        /* update table 'colors_array' */
        $links_color_id = $this->getLinksColorsIdByProdId($prod_id);

        $color_array =  array(
            'color_array' => $product_data['color_array']
        );
        $table_name = 'colors_array';
        if ($links_color_id=="")
        {
            $this->db->where('prod_id', $prod_id);
        }
        else
        {
            $this->db->where('id', $links_color_id);
        }
        $this->db->update($table_name, $color_array);




        // insert to table or update 'shop_specs_list' and to form shop_specs_array as id's array
        $n=0;
        $shop_specs_array = array();
        foreach($product_data['shopId_specs'] as $shopId_spec)
        {
            $shop_specs_data = array(
                'spec_name' => $product_data['shop_specs'][$n]
            );
            if ($shopId_spec =="#")
            {
                $this->db->insert('shop_specs_list', $shop_specs_data);
                $shop_spec_id = $this->db->insert_id();
            }
            else
            {
                $table_name = 'shop_specs_list';
                $this->db->where('id', $shopId_spec);
                $this->db->update($table_name, $shop_specs_data);
                $shop_spec_id = $shopId_spec;
            }
            array_push($shop_specs_array, $shop_spec_id);
            $n++;
        }

        /* update table 'specs_array' */
        $links_specs_id = $this->getLinksSpecsIdByProdId($prod_id);
        $specs_array =  array(
            'name_specs_array' => $product_data['name_specs_array'],
            'specs_array' => $product_data['specs_array'],
            'shop_specs_array' => implode(',',$shop_specs_array)
        );
        $table_name = 'specs_array';
        $this->db->where('id', $links_specs_id);
        $this->db->update($table_name, $specs_array);

    }

    function updatePriceProduct($price_data, $prod_id)
    {
        foreach($price_data as $price_item)
        {

            if ($price_item['id']=="#")
            {
                $shop_specs_data = array(
                    'color' => $price_item['color_id'],
                    'spec' => $price_item['spec_id'],
                    'prod_id' => $prod_id,
                    'weight' => 0
                );
                $this->db->insert('shop_specs', $shop_specs_data);
                $id = $this->db->insert_id();
                $shop_data = array(
                    'id' => $id,
                    'shop_id' => $price_item['article'],
                    'value' => $price_item['value'],
                    'prod_id' => $prod_id,
                    'price' =>  $price_item['price'],
                    'enabled' =>  1,
                    'currency_id' =>  2
                );
                $this->db->insert('shop', $shop_data);
            }
            else
            {
                $shop_data = array(
                    'shop_id' => $price_item['article'],
                    'value' => $price_item['value'],
                    'price' =>  $price_item['price']
                );
                $this->db->where('id', $price_item['id']);
                $this->db->update('shop', $shop_data);
            }
        }
    }


    function addColor($color_name)
    {
        $color_data = array(
            'color_name' => $color_name
        );

        $this->db->insert('color', $color_data);
        return  $this->db->insert_id(); //inserted_color_id
    }


    function getProductbyId($id)
    {
        $table_name = 'products_l';

        $this->db->from($table_name);
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }


    function getSpecsArrayIdByLinkId($link_id)
    {
        $table_name = 'specs_array';
        $this->db->from($table_name);
        $this->db->where('id', $link_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function getSpecsArrayIdByProdId($prod_id)
    {
        $table_name = 'specs_array';
        $this->db->from($table_name);
        $this->db->where('prod_id', $prod_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function getColorsArrayIdByLinkId($link_id)
    {
        $table_name = 'colors_array';
        $this->db->from($table_name);
        $this->db->where('id', $link_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function getColorsArrayIdByProdId($prod_id)
    {
        $table_name = 'colors_array';
        $this->db->from($table_name);
        $this->db->where('prod_id', $prod_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }


    function getProductsToEdit($search="")
    {


        $table_name = 'products_l';

        $this->db->from($table_name);
        $this->db->order_by('category_id', 'asc');
        $this->db->order_by('id', 'asc');
        $this->db->where('enabled', 1);
        if ($search!="")
        {
            $p = 'lower(product_name)';
            $this->db->where("$p LIKE lower('%$search%') ");
        }
        $query = $this->db->get();

        return $query->result();

    }



    function updateColorById($color_id, $color_name)
    {

        $color_data = array(
            'color_name' => $color_name
        );
        $table_name = 'color';

        $this->db->where('id', $color_id);
        $this->db->update($table_name, $color_data);
    }


    function updateProductToHide($product_id)
    {

        $update_data = array(
            'enabled' => 0
        );

        $table_name = 'products_l';

        $this->db->where('id', $product_id);
        $this->db->update($table_name, $update_data);
    }





}
?>