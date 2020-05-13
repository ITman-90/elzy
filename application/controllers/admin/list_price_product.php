<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class List_price_product extends CI_Controller {

    function List_price_product()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            $search = trim(xss_clean($this->input->post('search')));
            if (!isset($search)) $search ="";

            $data['view'] = $this->db_admin_model->getCatalogCategoryName();
            $data['category'] = $this->db_admin_model->getCategoryData();
            $data['list'] = $this->db_admin_model->getProductsToEdit($search);
            $data['search'] = $search;
            $data['title'] = "Редактирование цен продуктов";
            $data['template'] = "edit_price_product";
            $data['main_content'] = 'list_product';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }



}


