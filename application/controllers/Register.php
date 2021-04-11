<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        redirect_home();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $context = [
            'title' => "Register - Instasnap",
        ];
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('register', $context);
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean|min_length[1]|max_length[25]');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|max_length[45]|is_unique[user.email]');
            $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|min_length[5]|max_length[12]|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[5]|max_length[2555]|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('register', $context);
            } else {
                $register_data = array(
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                );
                $result = $this->user_model->insert($register_data); //TRUE or FALSE

                if ($result) {
                    $this->session->set_flashdata('register_success', 'Register is success, login now.');
                    redirect('login', 'refresh');
                }

                redirect('error');
            }
        }
    }
}
