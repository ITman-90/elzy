<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class List_search_product extends CI_Controller {

    function List_search_product()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            $template = trim(xss_clean($this->input->post('template')));
            $search = trim(xss_clean($this->input->post('search')));
            $title = trim(xss_clean($this->input->post('title')));
            if (!isset($search)) $search ="";


            $data['list'] = $this->db_admin_model->getProductsToEdit($search);
            $data['search'] = $search;
            $data['template'] = $template;
            $data['title'] = $title;
            if ($search=="")
            {

                $data['view'] = $this->db_admin_model->getCatalogCategoryName();
                $data['category'] = $this->db_admin_model->getCategoryData();
                $data['main_content'] = 'list_product';
            }
            else
                $data['main_content'] = 'list_search_product';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }



}


