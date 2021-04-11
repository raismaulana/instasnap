<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

	public function index()
	{
        redirect_home();
        $context = [
            'title' => "Login - Instasnap",
        ];
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('login', $context);
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login', $context);
            } else { 
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $result = $this->user_model->select_username($username);
                if (!empty($result)) {
                    if (password_verify($password, $result->password)) {
                        $sess = array(
                            'userid' => $result->iduser,
                         );
                        $this->session->set_userdata('userid', $sess);
                        redirect('home', 'refresh');
                    } else {
                        $this->session->set_flashdata('failed_login', 'Wrong username or password.');
                        redirect('login', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('failed_login', 'Wrong username or password.');
                    redirect('login', 'refresh');
                }
            }
        }
	}

    public function logout()
    {
        if(!is_guest()){
            $this->session->sess_destroy();
        }
        redirect('login', 'refresh');
    }
}
