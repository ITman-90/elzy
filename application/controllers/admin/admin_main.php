<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_main extends CI_Controller
{

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {

            $data['main_content'] = 'admin_main';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }



}
?>