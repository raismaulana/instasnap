<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('post_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $context = [
            'title' => 'Home - Instasnap',
        ];
        if (is_guest()) {
        } else {
            $id_user = get_iduser();
            $result = array(
                "userdata" => $this->user_model->select_id($id_user)
            );
            $context['result'] = $result;
            $this->load->view('home', $context);
        }
    }

    public function post()
    {
        $id_user = get_iduser();
        $dir = './data/'.$id_user;
        $date = date("Y-m-d H:i:s");
        $file_name = md5($id_user.'_'.$date);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, TRUE);
        
        }
        $config['upload_path']          = $dir;
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $file_name;
        $config['max_size']             = 2048;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('picture')) {
            // $error = array('error' => $this->upload->display_errors());
            // die(print_r($error));
            
            redirect('home', 'refresh');
        } else {
            // $data = array('upload_data' => $this->upload->data());
            // die(print_r($data));
            $data = array(
                'caption' => $this->input->post('caption'),
                'picture' => substr($dir, 2).'/'.$file_name,
                'date' => $date,
                'user_iduser' => $id_user,
            );
            $result = $this->post_model->insert($data); //true or false
            if ($result) {
                $this->session->set_flashdata('success', 'Your picture has been posted successfully');
                redirect('home', 'refresh');
            }
            redirect('home', 'refresh');
        }
    }
}
