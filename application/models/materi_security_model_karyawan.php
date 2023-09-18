<?php defined('BASEPATH') OR exit('No direct script access allowed');

class materi_security_model_karyawan extends CI_Model
{
	private $_table = "karyawan";
	
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getByID($id_karyawan)
  {
    return $this->db->get_where($this->_table,["id_karyawan"=>$id_karyawan])->row();
  }
	
	public function getByUsernamePassword()
	{
		$post1 = $this->input->post();
		$nama_karyawan = $post1["nama_karyawan"];
		$password = $post1["password"];
		$array = array('nama_karyawan' => $nama_karyawan, 'password' => $password);
		$query = $this->db->get_where($this->_table,$array);
		return $query->row();
	}

	public function save() 
	{
		
		$post = $this->input->post();
		$this->id_karyawan = $post["id_karyawan"];
		$this->username = $post["username"];
		$this->password =$post["password"];
		
		$getRole = $post["role"];
		if($getRole == 1){
			$this->role = 1;
		}
		else if($getRole == 2){
			$this->role = 2;
		}
		//$this->role = $post["role"];
		$this->status = "1";
		$this->foto = $this->_uploadImage($_FILES['foto']['name']);
		$this->createdby = $_SESSION['username'];
		$this->createdDate =  date("y-m-d H:i:s");
		

		return $this->db->insert($this->_table, $this);
	}

	function RandomStringGenerator() 
		{ 
		    // Variable which store final string3 
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

		public function update($id_karyawan, $data)
		{
			$this->db->where('id_karyawan', $id_karyawan);
			$query = $this->db->update('karyawan', $data);
		}
		public function hapus($id_karyawan, $data){
			$this->db->where('id_karyawan',$id_karyawan);
			$query = $this->db->update($this->_table, $data);
		}
		public function edit($id_karyawan)
		{
			$user = $this->db->get_where('karyawan', array('id_karyawan' => $id_karyawan));
			return $user;
		}

		function getData($id_member){
			$this->db->select('*');
			$this->db->from('karyawan');
			//$this->db->join('detil_paket', 'detil_paket.id_paket = paket.id_paket');
			//$this->db->join('produk', 'detil_paket.id_produk = produk.id_produk');
			$this->db->where('karyawan.id_karyawan',$id_karyawan);
			$query = $this->db->get();
			return $query;
		}


		function getDataDetil($id_karyawan){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->where('karyawan.id_karyawan',$id_karyawan);
			$query = $this->db->get();
			return $query;
		}

		private function _uploadImage($namagambar)
  {
    $config['upload_path']          = './upload/profile/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $namagambar;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
  }
	
}