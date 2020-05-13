<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Catalog extends CI_Controller {

    function index()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'catalog';

        $this->load->view('template/template', $data);

    }

    function novelty()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $products = $this->client_shop_model->getNoveltyList();

        $shop_product_price_array = array(
            'product_id' => 0,
            'shop_product_price' => 0
        );

        $shop_product_price_list = array();

        foreach($products as $product)
        {
            $shop_product_price_array['product_id'] = $product->product_id;

            $shop_product_price = $this->client_shop_model->getShopProductPriceById($product->product_id);

            $shop_product_price_array['shop_product_price'] = $shop_product_price[0]->shop_product_price;

            $shop_prods = $shop_product_price_array;
            $shop_prods = (object) $shop_prods;

            array_push($shop_product_price_list, $shop_prods);
        }

        $data['products_new'] = $products;

        $data['template_content'] = 'novelty';

        $this->load->view('template/template', $data);

    }

    function sale()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $products = $this->client_shop_model->getSaleList();

        $shop_product_price_array = array(
            'product_id' => 0,
            'shop_product_price' => 0
        );

        $shop_product_price_list = array();

        foreach($products as $product)
        {
            $shop_product_price_array['product_id'] = $product->product_id;

            $shop_product_price = $this->client_shop_model->getShopProductPriceById($product->product_id);

            $shop_product_price_array['shop_product_price'] = $shop_product_price[0]->shop_product_price;

            $shop_prods = $shop_product_price_array;
            $shop_prods = (object) $shop_prods;

            array_push($shop_product_price_list, $shop_prods);
        }

        $data['products_sale'] = $products;

        $data['template_content'] = 'sale';

        $this->load->view('template/template', $data);

    }

    function parent_category()
    {
        $url_segment = $this->uri->segment(2);

        $category_array = array();
        $products_array = array();
        $seo_desc_array = array();

        $category = $this->client_shop_model->getParentCategoryByUrl($url_segment);
        if ($category==null)
        {
            redirect('page_not_found');
            return;
        }
        $category_id = $category[0]->parent_category_id;
        $sub_category = $this->client_shop_model->getSubCategoryById($category_id);

        foreach($sub_category as $sub)
        {
            $add_id = $sub->sub_category_id;
            array_push($category_array, $add_id);



            $products_array[$add_id] = $this->client_shop_model->getProductsForSubCategory($add_id);

            foreach ($products_array[$add_id] as $novelty)
            {

                $product_id = $novelty->product_id;

                $get_shop_product = $this->client_shop_model->getShopProductFirstPrice($product_id);
                if (count($get_shop_product)>0) $shop_product = $get_shop_product[0];
                $novelty->first_shop_product_price = $shop_product->shop_product_price;
            }
            if( $sub->category_seo_title == null)
            {
                $parent_category_name = $category[0]->category_name;
                $sub_category_name = $sub->category_name;
                $category_title = mb_strtolower($parent_category_name. ' ('.$sub_category_name.')', 'UTF-8');
            }
            else
            {
                $category_title = $sub->category_seo_title;
            }


            $seo_desc_array[$add_id] = 'Вы можете купить '.$category_title.' в Москве и МО сейчас, сделав онлайн заказ в интернет-магазине детской одежды "Elzy.ru".';

        }



        $shop_product_price_array = array(
            'product_id' => 0,
            'shop_product_price' => 0
        );

        $shop_product_price_list = array();

        $parent_category_first_price = 9999999;
        foreach($products_array as $product)
        {
            foreach($product as $prod)
            {
                $shop_product_price_array['product_id'] = $prod->product_id;

                $shop_product_price = $this->client_shop_model->getShopProductPriceById($prod->product_id);

                $shop_product_price_array['shop_product_price'] = $shop_product_price[0]->shop_product_price;

                $shop_prods = $shop_product_price_array;
                $shop_prods = (object) $shop_prods;
                if ($parent_category_first_price > $shop_product_price[0]->shop_product_price) $parent_category_first_price = $shop_product_price[0]->shop_product_price;

                array_push($shop_product_price_list, $shop_prods);
            }
        }
        if  ($parent_category_first_price == 9999999) $parent_category_first_price = 0;



        if( $category[0]->category_seo_title == null)
        {
            $sub_category_name = $category[0]->category_name;
            $seo_title = mb_strtolower($sub_category_name, 'UTF-8');
        }
        else
        {
            $seo_title = $category[0]->category_seo_title;
        }

        $seo_tags = $category[0]->product_seo_tags;
        $seo_desc = $category[0]->product_description;

        $data['seo_title'] = 'Купить детскую одежду ('.$seo_title.') в Москве. Цена от '.$parent_category_first_price.'р. Одежда для детей: Комбинезончики, Комлекты, Боди, Песочники, Верхняя одежда';
        $data['seo_tags'] = $seo_tags;
        $data['seo_desc'] = $seo_desc;
        $data['seo_desc_array'] = $seo_desc_array;


        $data['category'] = $category;
        $data['sub_category'] = $sub_category;
        $data['products'] = $products_array;

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'parent_category';

        $this->load->view('template/template_main', $data);
    }

    function sub_category()
    {
        $url_segment = $this->uri->segment(3);


        $category = $this->client_shop_model->getSubCategoryByUrl($url_segment);
        if ($category==null)
        {
            redirect('page_not_found');
            return;
        }
        $category_id = $category[0]->sub_category_id;

        $parent_category_id = $category[0]->parent_category_id;
        $parent_category = $this->client_shop_model->getParentCategoryById($parent_category_id);


        $sub_categories = $this->client_shop_model->getSubCategoryById($parent_category_id);


        //echo "<h1>". $category[0]->sub_category_type."</h1>";

        $products = $this->client_shop_model->getProductsByCategoryId($category_id, $category[0]->sub_category_type);

        $shop_product_price_array = array(
            'product_id' => 0,
            'shop_product_price' => 0
        );

        $shop_product_price_list = array();
        $sub_category_first_price = 9999999;
        foreach($products as $product)
        {
            $shop_product_price_array['product_id'] = $product->product_id;

            $shop_product_price = $this->client_shop_model->getShopProductPriceById($product->product_id);

            $shop_product_price_array['shop_product_price'] = $shop_product_price[0]->shop_product_price;

            $shop_prods = $shop_product_price_array;
            $shop_prods = (object) $shop_prods;
            if ($sub_category_first_price > $shop_product_price[0]->shop_product_price) $sub_category_first_price = $shop_product_price[0]->shop_product_price;
            array_push($shop_product_price_list, $shop_prods);


            $product_id = $product->product_id;

            $get_shop_product = $this->client_shop_model->getShopProductFirstPrice($product_id);
            if (count($get_shop_product)>0) $shop_product = $get_shop_product[0];
            $product->first_shop_product_price = $shop_product->shop_product_price;




        }

        if  ($sub_category_first_price == 9999999) $sub_category_first_price = 0;



        if( $category[0]->category_seo_title == null)
        {
            $parent_category_name = $parent_category->category_name;
            $sub_category_name = $category[0]->category_name;
            $category_title = $sub_category_name.' ('.$parent_category_name.')';
        }
        else
        {
            $category_title = $category[0]->category_seo_title;
        }



        $data['seo_desc_title'] = 'Вы можете купить '.$category_title.' в Москве и МО сейчас, выберите товар из каталога детской одежды и сделайте онлайн заказ в интернет-магазине "Elzy.ru".';


        $data['seo_title'] = 'Купить детскую одежду ('.mb_strtolower($category_title, 'UTF-8').') в Москве. Цена от '.$sub_category_first_price.'р. Одежда для детей: Комбинезончики, Комлекты, Боди, Песочники, Верхняя одежда';
        $data['seo_tags'] = $category[0]->product_seo_tags;
        $data['seo_desc'] = $category[0]->product_description;

        $data['parent_category'] = $parent_category;
        $data['category'] = $category;
        $data['sub_categories'] = $sub_categories;
        $data['products'] = $products;

        $data['template_content'] = 'sub_category';

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();
        $this->load->view('template/template_main', $data);
    }

    function product_layout()
    {
        $url_segment = $this->uri->segment(4);
        $sub_category_segment = $this->uri->segment(3);

        $sub_category = $this->client_shop_model->getSubCategoryByUrl($sub_category_segment);
        $category_id = $sub_category[0]->sub_category_id;
        $product = $this->client_shop_model->getProductByUrlAndCategoryId($url_segment,$category_id);

        //$category_id = $product[0]->category_id;
        $product_id = $product[0]->product_id;

       // $sub_category = $this->client_shop_model->getCategoryById($category_id);

        $parent_category_id = $sub_category[0]->parent_category_id;
        $parent_category = $this->client_shop_model->getParentCategoryById($parent_category_id);

        $sub_categories = $this->client_shop_model->getSubCategoryById($parent_category_id);
        $data['sub_categories'] = $sub_categories;

        $product_colors = $this->client_shop_model->getProductColorsById($product_id);
        $product_specs = $this->client_shop_model->getProductSpecsById($product_id);


        $product_colors_array = array();

        $shop_product_array = $this->client_shop_model->getShopProductById($product_id);

        $product_colors_ar = array();

        $sorted_product_colors_array = array();
        foreach($product_colors as $product_color)
        {
            array_push($product_colors_ar, $product_color->shop_product_color);
        }
        $colors = $this->client_shop_model->getColorsListByListId($product_colors_ar, $product_id);



        foreach($colors as $color)
        {
            foreach($product_colors_ar as $product_color)
            {
                if($product_color == $color->id)
                {
                    if (!(in_array($color->id, $sorted_product_colors_array)))
                    {
                        array_push($sorted_product_colors_array, $color->id);
                        array_push($product_colors_array, $color->color_name);
                    }

                }
            }
        }



        $product_spec_names = $product_specs[0]->products_spec_name;
        $product_spec_array = $product_specs[0]->products_spec_array;
        $shop_product_spec_array = $product_specs[0]->shop_products_spec_array;

        $product_spec_names = explode(',', $product_spec_names);
        $product_spec_array = explode(',', $product_spec_array);
        $shop_product_spec_array = explode(',', $shop_product_spec_array);

        $shop_product_specs = array();
        $sorted_shop_product_spec_array = array();

        $specs = $this->client_shop_model->getShopProductsSpecsByListId($shop_product_spec_array, $product_id);
        foreach($specs as $spec)
        {
            for($i=0; $i<count($shop_product_spec_array); $i++)
            {

                if($shop_product_spec_array[$i] == $spec->spec_id)
                {
                    if (!(in_array($spec->spec_id, $sorted_shop_product_spec_array)))
                    {
                        array_push($sorted_shop_product_spec_array, $spec->spec_id);
                        array_push($shop_product_specs, $spec->spec_name);
                    }
                }
            }
        }


        $user_session_id = $this->session->userdata('session_id');

        $status_data = array(
            'user_session_id' => $user_session_id,
            'product_id' => $product_id
        );

        $collate_status = $this->client_shop_model->getCollateStatus($status_data);
        $bookmarks_status = $this->client_shop_model->getBookmarksStatus($status_data);

        if($collate_status == true)
        {
            $data['collate_status'] = 1;
        }
        else
        {
            $data['collate_status'] = 0;
        }

        if($bookmarks_status == true)
        {
            $data['bookmarks_status'] = 1;
        }
        else
        {
            $data['bookmarks_status'] = 0;
        }

        $data['products_reviews'] = $this->client_shop_model->getProductsReviews($product_id);

        $data['parent_category'] = $parent_category;
        $data['category'] = $sub_category;
        $data['product'] = $product;
        $data['product_colors'] = $sorted_product_colors_array;
        $data['product_spec_names'] = $product_spec_names;
        $data['product_spec_array'] = $product_spec_array;
        $data['shop_products_spec_array'] = $sorted_shop_product_spec_array;
        $data['colors'] = $product_colors_array;
        $data['specs'] = $shop_product_specs;

        $data['shop_products'] = $shop_product_array;

        $data['image'] = $this->client_shop_model->createCaptcha();

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();
        $data['template_content'] = 'product_view';




        if($product[0]->product_seo_title != null)
        {
            $product_title = $product[0]->product_seo_title;
        }
        else
        {
            if($product[0]->product_card_name == null)
            {
                $product_title = mb_strtolower($product[0]->product_name, 'UTF-8');
            }
            else
            {
                $product_title = mb_strtolower($product[0]->product_card_name, 'UTF-8');
            }

            if($product[0]->product_card_model_name != null)
            {
                $product_title = $product[0]->product_card_model_name.' ('.$product_title.')';
            }
        }

        $parent_category_name = $parent_category->category_name;
        $sub_category_name = $sub_category[0]->category_name;
        $category_title = $sub_category_name.' ('.$parent_category_name.')';

        $data['seo_title'] = 'Купить детскую одежду ('.$product_title.') в Москве. Продажа "'.mb_strtolower($category_title, 'UTF-8').'" Одежда для детей: Комбинезончики, Комлекты, Боди, Песочники, Верхняя одежда';

        $data['seo_desc_title']  = 'Вы можете <b>купить детскую одежду '.$product_title.'</b> сейчас, выберите нужный размер и нажмите кнопку купить ниже. Доставка по Москве и МО курьером завтра. Возможен самовывоз.';



        $data['seo_tags'] = $product[0]->product_seo_tags;
        $data['seo_desc'] = $product[0]->product_description;
        if ($product == null)
        {
            redirect('page_not_found');
            return;
        }
        $data['template_content'] = 'product_view';
        $this->load->view('template/template_product', $data);
    }

    function captcha_update()
    {

        $updated_captcha = $this->client_shop_model->createCaptcha();

        $send_update_captcha = array(
            'updated_captcha' => $updated_captcha
        );

        echo json_encode($send_update_captcha);

    }

    function get_related_products()
    {

        $current_product_id = $this->input->post('current_product_id');
        $current_sub_category_id = $this->input->post('current_sub_category_id');

        $related_products = $this->client_shop_model->getRelatedProducts($current_product_id, $current_sub_category_id);

        echo json_encode($related_products);

    }

    function send_review()
    {

        $datestring = "%Y-%m-%d %H:%i:%s";

        $time = time();

        $product_id = trim(xss_clean($this->input->post('product_id')));
        $product_name = trim(xss_clean($this->input->post('product_name')));
        $plus_text = trim(xss_clean($this->input->post('plus_text')));
        $minus_text = trim(xss_clean($this->input->post('minus_text')));
        $result_text = trim(xss_clean($this->input->post('result_text')));
        $client_name = trim(xss_clean($this->input->post('client_name')));
        $client_email = trim(xss_clean($this->input->post('client_email')));
        $datetime = mdate($datestring, $time);


        $config_question = array(
            array(
                'field'   => 'captcha',
                'label'   => '',
                'rules'   => 'trim|strip_tags|required|xss_clean|callback_captcha_check'
            )
        );

        $this->form_validation->set_rules($config_question);


        if($this->form_validation->run() == FALSE)
        {

            header('HTTP/1.1 500 Internal Server Error');
            return false;

        }
        else
        {

            $send_data = array(
                'product_id' => $product_id,
                'plus_text' => $plus_text,
                'minus_text' => $minus_text,
                'result_text' => $result_text,
                'client_name' => $client_name,
                'client_email' => $client_email,
                'datetime' => $datetime,
            );

            $this->client_shop_model->addProductReview($send_data);

            $review_send_mail = '
            <html>
            <body>

            <h3>Новый отзыв о товаре в Интернет-магазине детской одежды "Elzy.ru"</h3>
            <br>
            <h3>Название товара: '.$product_name.'</h3>
            <h3>Клиент: '.$client_name.'</h3>
            <h3>Почта: '.$client_email.'</h3>


            <p>Достоинства: '.$plus_text.'</p>
            <p>Недостатки: '.$minus_text.'</p>
            <p>Общие впечатления: '.$result_text.'</p>


            </body>
            </html>
            ';

            $this->email->from('elzy@gmail.com', 'Интернет-магазин детской одежды "Elzy.ru"');
            $this->email->to('elzy@gmail.com');
            $this->email->subject('Новый отзыв в Интернет-магазине детской одежды "Elzy.ru"');
            $this->email->message($review_send_mail);
            $this->email->send();

            $answer_data = array(
                'status' => 1
            );

            echo json_encode($answer_data);

            return true;
        }

    }

    function captcha_check($q)
    {

        $value = $this->client_shop_model->checkCaptcha($q);

        if(!empty($value))
        {
            foreach($value as $v)
            {
                if($q == $v->word)
                {
                    return true;
                }
            }
        }
        else
        {
            $this->form_validation->set_message('captcha_check', 'Вы ввели не правильный код подтверждения.');
            return false;
        }

    }


}