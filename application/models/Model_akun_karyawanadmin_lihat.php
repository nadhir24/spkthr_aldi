<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Model_akun_karyawanadmin_lihat extends CI_Model
	{
		private $_table = "karyawan";
		
		public function getAll()
		{
			$SESSION = $_SESSION['username'];

			$query = $this->db->query("SELECT * FROM karyawan where username = '$SESSION'");

			if($query->num_rows() > 0) {
		        $results = $query->result();
		    }
		    return $results;
		}

		public function save($data)
		{
			return $this->db->insert($this->_table, $data);
		}

		function RandomStringGenerator() 
		{ 
		    // Variable which store final string 
		    $generated_string = "";
		    // Create a string with the help of small letters, capital letters and digits. 
		    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    // Find the lenght of created string 
		    $len = strlen($domain); 
		    // Loop to create random string 
		    for ($i = 0; $i < 6; $i++) 
		    { 
		        // Generate a random index to pick characters 
		        $index = rand(0, $len - 1); 
		        // Concatenating the character in resultant string 
		        $generated_string = $generated_string . $domain[$index]; 
		    }
		    return $generated_string; 
		}

		public function editakunkaryawanadmin()
		{
			$post = $this->input->post();
			$data = array (
		            'username' => $this->input->post('username'),
		            'nama_karyawan' => $this->input->post('nama_karyawan'),
		            'alamat' => $this->input->post('alamat'),
		            'email' => $this->input->post('email'),
		            'telepon' => $this->input->post('telepon'),
		      
		           
		            'password' => $this->input->post('password')
		        );
		 
			$where = array(
				'username' => $this->input->post('username'),
			);

			$this->db->where($where);
			return $this->db->update($this->_table, $data);
		}

		
	}
?>