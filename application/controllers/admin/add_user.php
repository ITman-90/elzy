<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Add_user extends CI_Controller {

    function Add_user()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {

            $data['main_content'] = 'add_user';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }

    function add_new_user()
    {


        if($this->session->userdata('logged_in') == TRUE)
        {

            $username = trim(xss_clean($this->input->post('username')));
            $email = trim(xss_clean($this->input->post('email')));
            $password = trim(xss_clean($this->input->post('password')));
            $group = trim(xss_clean($this->input->post('groups')));

            $uri = $this->input->post('uri');

            $this->flexi_auth_model->insert_user($email, $username, $password, 0, $group, TRUE);
            redirect(base_url()."admin/hide_user");
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }

}


