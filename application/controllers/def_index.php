<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Def_Index extends CI_Controller {


    function unsert_col()
    {



    }

    function index()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $novelty_list = $this->client_shop_model->getNoveltyList(4);
        $sale_list = $this->client_shop_model->getSaleList(4);


        foreach($novelty_list as $novelty)
        {
            $product_id = $novelty->product_id;

            $get_shop_product = $this->client_shop_model->getShopProductFirstPrice($product_id);
            if (count($get_shop_product)>0) $shop_product = $get_shop_product[0];
            $novelty->first_shop_product_price = $shop_product->shop_product_price;


        }


        foreach($sale_list as $sale)
        {
            $product_id = $sale->product_id;

            $get_shop_product = $this->client_shop_model->getShopProductFirstPrice($product_id);
            if (count($get_shop_product)>0) $shop_product = $get_shop_product[0];
            $sale->first_shop_product_price = $shop_product->shop_product_price;

        }

        $last_news = $this->client_shop_model->getLastNews(1);

        $data['last_new'] = $last_news[0];

        $data['novelty_list'] = $novelty_list;
        $data['sale_list'] = $sale_list;

        $data['template_content'] = 'def_index';

        $this->load->view('template/template_main', $data);

    }

    function news()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'news';

        $this->load->view('template/template_information', $data);

    }


    function delivery()
    {

        $data['image'] = $this->client_shop_model->createCaptcha();
        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'delivery';

        $this->load->view('template/template_information', $data);

    }

    function contacts()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'contacts';

        $data['image'] = $this->client_shop_model->createCaptcha();
        $this->load->view('template/template_information', $data);

    }

    function callback()
    {
        $this->load->view('callback');
    }

    function oplata()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['image'] = $this->client_shop_model->createCaptcha();
        $data['template_content'] = 'oplata';

        $this->load->view('template/template_information', $data);


    }
    function company()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'company';

        $this->load->view('template/template_information', $data);

    }

    function page_not_found()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();
        $data['template_content'] = 'page_not_found';
        $this->load->view('template/template_information', $data);

    }


    function article_current()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'article_current';

        $this->load->view('template/template_information', $data);

    }

    function news_current()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'news_current';

        $this->load->view('template/template_information', $data);

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

    function send_callback()
    {
        $client_name = trim(xss_clean($this->input->post('callback_client_name')));
        $client_phone = trim(xss_clean($this->input->post('callback_client_phone')));
        $client_email = trim(xss_clean($this->input->post('callback_client_email')));
        $client_text = trim(xss_clean($this->input->post('callback_client_text')));
        $action_type = "Обратный звонок";
        $this->user_action_send($client_name, $client_phone, $client_email, $client_text, $action_type);


        $encodeData = array(
            'client_name' => $client_name,
            'client_phone' => $client_phone,
            '$client_email' => $client_email,
            'client_text' => $client_text
        );

        echo json_encode($encodeData);
    }


    function send_ask()
    {
        $client_name = trim(xss_clean($this->input->post('ask_client_name')));
        $client_phone = trim(xss_clean($this->input->post('ask_client_phone')));
        $client_email = trim(xss_clean($this->input->post('ask_client_email')));
        $client_text = trim(xss_clean($this->input->post('ask_client_text')));
        $client_captcha = trim(xss_clean($this->input->post('ask_client_captcha')));
        $action_type = "Вопрос";



        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        if($this->captcha_check($client_captcha)==false)
        {
            $data['image'] = $this->client_shop_model->createCaptcha();
            $data['ask_client_name'] = $client_name;
            $data['ask_client_phone'] = $client_phone;
            $data['ask_client_email'] = $client_email;
            $data['ask_client_text'] = $client_text;
            $data['template_content'] = 'send_action_error';
        }
        else
        {
            $this->user_action_send($client_name, $client_phone, $client_email, $client_text, $action_type);
            $data['template_content'] = 'send_action_success';


        }

        $this->load->view('template/template_information', $data);



    }

    function user_action_send($client_name, $client_phone, $client_email, $client_text, $action_type)
    {
        $datestring = "%Y-%m-%d %H-%i-%s";
        $time = time();

        $datetime = mdate($datestring, $time);

        $callbackData = array(
            'client_name' => $client_name,
            'client_phone' => $client_phone,
            'client_text' => $action_type.'. '.$client_text,
            'client_email' => $client_email,
            'datetime' => $datetime
        );

        $this->client_shop_model->insertCallback($callbackData);

        $client_send_mail = '
            <html>
            <body>

            <h3>'.$action_type.' из Интернет-магазина детской одежды "Elzy.ru"</h3>
            <br>
            <h3>Клиент: '.$client_name.'</h3>

            <h3>Вопрос:</h3>
            <p>'.$client_text.'</p>

            <h3>E-mail:</h3>
            <p>'.$client_email.'</p>

            <h3>Телефон:</h3>
            <p>'.$client_phone.'</p>


            <h3>Время:</h3>
            <p>'.$datetime.'</p>

            </body>
            </html>
            ';

        $this->email->from('elzy@gmail.com', 'Интернет-магазин детской одежды "Elzy.ru"');
        $this->email->to('elzy@gmail.com');
        $this->email->subject($action_type.' из Интернет-магазина детской одежды "Elzy.ru"');
        $this->email->message($client_send_mail);
        $this->email->send();


    }


    function ajax_get_subcategory()
    {

        $parent_category_id = trim(xss_clean($this->input->post('parent_category_id')));

        $parentCategory = $this->client_shop_model->getParentCategoryAjax($parent_category_id);
        $subCategory = $this->client_shop_model->getSubCategoryAjax($parent_category_id);

        $encodeData = array(
            'parentCategory' => $parentCategory,
            'subCategory' => $subCategory
        );



        echo json_encode($encodeData);
    }


}