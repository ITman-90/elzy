<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News extends CI_Controller {


    function index()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();
        $data['news'] = $this->client_shop_model->getNews();

        $data['template_content'] = 'news';

        $this->load->view('template/template_information', $data);

    }

    function news_page()
    {
        $url_segment = $this->uri->segment(2);
        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'news_current';
        $data['news_page'] = $this->client_shop_model->getNewsPage($url_segment);
        $this->load->view('template/template_information', $data);

    }

}