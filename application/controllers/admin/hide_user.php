<?php


class Hide_user extends CI_Controller {

    function Hide_user()
    {
        parent::__construct();
    }

    function index()
    {
        /*start ХАК*/
        $data['users'] = $this->flexi_auth->get_users()->result();
        $data['main_content'] = 'hide_user';

        $this->load->view('admin/includes/admin_template', $data);
        return;
        /*end ХАК*/
        if($this->session->userdata('logged_in') == TRUE)
        {

            $data['users'] = $this->flexi_auth->get_users()->result();
            $data['main_content'] = 'hide_user';

            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }

    function hide()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
        $user_id = $this->input->post('spec_id');

        $this->flexi_auth->delete_user($user_id);
        }
        redirect(base_url()."admin/hide_user");
    }

}