<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Payment_methods extends CI_Controller {

    function index()
    {
        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'payment_methods';

        $data['page_content'] = $this->client_shop_model->getPageContent($data['template_content']);

        $this->load->view('template/template', $data);
    }

}