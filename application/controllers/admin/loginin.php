<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class LoginIn extends CI_Controller {

    function LoginIn()
    {
        parent::__construct();
    }


    function index()
    {
        $data['main_content'] = 'loginin';

        $this->load->view('admin/includes/admin_template', $data);
    }

    function check_user()
    {

        $username = trim(xss_clean($this->input->post('username')));
        $password = trim(xss_clean($this->input->post('password')));
        $uri = trim(xss_clean($this->input->post('uri')));

        $sql_select = array(
            'uacc_username',
            'uacc_password',
            'uacc_email',
            'uacc_group_fk'
        );

        $sql_where = array(
            'uacc_username' => $username
        );

        $checkuser = $this->flexi_auth->get_users($sql_select, $sql_where)->result();

        $identity = $checkuser[0]->uacc_email;

        $login = $this->flexi_auth->login($identity, $password, TRUE);


        if($login == true)
        {
            $newdata = array(
                'logged_in' => TRUE,
                'acc_name' => $checkuser[0]->uacc_username,
                'acc_group' => $checkuser[0]->uacc_group_fk
            );

            $this->session->set_userdata($newdata);

            redirect($uri);

        }
        else
        {
            redirect($uri);
        }


    }

    function logout()
    {

        $this->flexi_auth->logout(TRUE);

        $newdata = array(
            'logged_in' => false,
            'acc_name' => false,
            'acc_group' => false
        );

        $this->session->set_userdata($newdata);

        redirect(base_url()."admin");
    }

}


