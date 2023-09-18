<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Security_model extends CI_Model {
		private $_table = "karyawan";

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getByUsernamePassword()
		{
			$post1 = $this->input->post();
			$username = $post1["username"];
			$password = $post1["password"];
			$array = array('username' => $username, 'password' => $password);
			$query = $this->db->get_where($this->_table, $array);
			return $query->row();
		}
	}
?>