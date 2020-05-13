<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class List_color extends CI_Controller {

    function List_color()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            $config_question = array(
                array(
                    'field'   => 'color_name',
                    'label'   => 'Наименование цвета',
                    'rules'   => 'required'
                )
            );

            $this->form_validation->set_rules($config_question);

            $this->form_validation->set_error_delimiters('<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">', '</div>');


            if(($this->form_validation->run() == TRUE))
            {

                $color_name = trim(xss_clean($this->input->post('color_name')));
                $color_id = trim(xss_clean($this->input->post('color_id')));

                $this->db_admin_model->updateColorById($color_id, $color_name);


                $prod_path = $_SERVER['DOCUMENT_ROOT']."/public/img/catalog_imgs/color/";

                $config['upload_path'] = $prod_path;
                $config['allowed_types'] = 'png';
                $config['remove_spaces'] = TRUE;
                $config['overwrite'] = TRUE;

                $color_file = "color_file";

                $_FILES[$color_file]['name']='color_'.$color_id.'.png';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                $this->upload->do_upload($color_file);
                chmod ($prod_path.$_FILES[$color_file]['name'], 0666);
            }


            $data['colors_list'] = $this->db_admin_model->getColorsList();
            $data['main_content'] = 'list_color';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }



}


