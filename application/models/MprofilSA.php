<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MprofilSA extends CI_Model{

    public $id_karyawan;
    public $karyawan;
    private $_table = "karyawan";

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'karyawan';
    }

    public function getAllSA()
		{
			$SESSION = $_SESSION['username'];

			$query = $this->db->query("SELECT * FROM karyawan where username = '$SESSION'");

			if($query->num_rows() > 0) {
		        $results = $query->result();
		    }
		    return $results;
		}

    private function getData(){
        $data = array(
            'karyawan' => $this->karyawan,
        );

        return $data;
    }

    public function editakunkaryawanadminSA()
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


    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $karyawan[] = $row;
            }
            return $karyawan;
        }
    }

    public function getKaryawanById($id)
    {
        $query = $this->db->query(
            "SELECT * FROM karyawan WHERE id_karyawan = '$id'"
        );

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

   

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function insertKaryawan($feedback)
	{
		if(!$feedback){
			return;
		}

		return $this->db->insert($this->_table, $feedback);
    }
    
    public function updateKaryawan($feedback, $where)
	{
		if(!$feedback){
			return;
        }
        
        if(!$where){
			return;
		}

		return $this->db->update($this->_table, $feedback, $where);
	}

    public function delete($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->delete($this->getTable());
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    
}