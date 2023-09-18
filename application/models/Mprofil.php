<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class Mprofil extends CI_Model{

    public $id_karyawan;
    public $karyawan;
    private $_table = "karyawan";

    public function __construct(){
        parent::__construct();
    }

    public function getAll()
		{
			$SESSION = $_SESSION['username'];

			$query = $this->db->query("SELECT * FROM karyawan where username = '$SESSION'");

			if($query->num_rows() > 0) {
		        $results = $query->result();
		    }
		    return $results;
		}

    private function getTable()
    {
        return 'karyawan';
    }

    private function getData(){
        $data = array(
            'karyawan' => $this->karyawan,
        );

        return $data;
    }

    public function editakunkaryawanadmin()
    {
        $post = $this->input->post();
        $data = array (
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'password' => $this->input->post('password')
            );
     
        $where = array(
            'id_karyawan' => $this->input->post('id_karyawan'),
        );

        $this->db->where($where);
        return $this->db->update($this->_table, $data);
    }


  

   

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    
}