<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function insert($data)
	{
		$this->db->insert('post', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function get_all_post()
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('user', 'post.user_idUser = user.iduser');
		return $this->db->get()->result();
	}


}