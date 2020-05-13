<?php


class Market extends CI_Controller {

    function index()
    {
        $data['parent_category'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category'] = $this->client_shop_model->getSubCategoryList();
        $data['products'] = $this->client_shop_model->getProductsEnabledList();

        $this->load->view('market',$data);
    }

}