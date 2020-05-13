<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Hide_product extends CI_Controller {

    function Hide_product()
    {
        parent::__construct();
    }

    function index()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $config_question = array(
                array(
                    'field'   => 'hide_product',
                    'label'   => '',
                    'rules'   => 'required'
                )
            );

            $this->form_validation->set_rules($config_question);

            $this->form_validation->set_message('required', 'Нужно поставить галочку!');

            $this->form_validation->set_error_delimiters('<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">', '</div>');

            if($this->form_validation->run() == FALSE)
            {
                $data['view'] = $this->db_admin_model->getCatalogCategoryName();
                $data['category'] = $this->db_admin_model->getCategoryData();
                $data['list'] = $this->db_admin_model->getProductsToEdit();

                $data['main_content'] = 'hide_product';

                $this->load->view('admin/includes/admin_template', $data);
            }
            else
            {
                $checked = trim(xss_clean($this->input->post('hide_product')));
                $product_id = trim(xss_clean($this->input->post('product_id')));

                if($checked == "on")
                {
                    $this->db_admin_model->updateProductToHide($product_id);

                    $data['view'] = $this->db_admin_model->getCatalogCategoryName();
                    $data['category'] = $this->db_admin_model->getCategoryData();
                    $data['list'] = $this->db_admin_model->getProductsToEdit();

                    $data['main_content'] = 'hide_product';

                    $this->load->view('admin/includes/admin_template', $data);

                }

            }
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }


}


