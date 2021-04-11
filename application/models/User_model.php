<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function insert($data)
	{
		$this->db->insert('user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
	}

    public function select_id($id)
    {
		$this->db->select('name');
		$this->db->select('username');
		$this->db->select('email');
        $this->db->where('iduser', $id);
        return $this->db->get('user')->row();
    }

    public function select_username($username)
    {
        $this->db->where('username like binary', $username);
        return $this->db->get('user')->row();
    }

}