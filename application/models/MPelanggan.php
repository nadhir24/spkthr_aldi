<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:51
 */

class MPelanggan extends CI_Model{

    public $kdPelanggan;
    public $pelanggan;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'pelanggan';
    }

    private function getData(){
        $data = array(
            'pelanggan' => $this->pelanggan
        );

        return $data;
    }

    public function getAll()
    {
        $pelanggan = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $pelanggan[] = $row;
            }
        }
        return $pelanggan;
    }


    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('kdPelanggan', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdPelanggan');
        $this->db->order_by('kdPelanggan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}