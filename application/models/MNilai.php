<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MNilai extends CI_Model{

    public $kdPelanggan;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'kdPelanggan' => $this->kdPelanggan,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByPelanggan($id)
    {
        // $query = $this->db->query(
        //     'select u.kdPelanggan, u.pelanggan, k.kdKriteria, n.nilai from pelanggan u, nilai n, kriteria k, subkriteria sk where u.kdPelanggan = n.kdPelanggan AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdPelanggan = '.$id.' GROUP by n.nilai '
        // );

        $query = $this->db->query(
            "SELECT a.kdPelanggan, a.pelanggan, b.kdKriteria, b.nilai
            FROM pelanggan AS a
            LEFT JOIN nilai AS b ON b.kdPelanggan = a.kdPelanggan
            WHERE a.kdPelanggan = '$id'"
        );

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiPelanggan()
    {
        $query = $this->db->query(
            'select u.kdPelanggan, u.pelanggan, k.kdKriteria, k.kriteria ,n.nilai from pelanggan u, nilai n, kriteria k where u.kdPelanggan = n.kdPelanggan AND k.kdKriteria = n.kdKriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('kdPelanggan', $this->kdPelanggan);
        $this->db->where('kdKriteria', $this->kdKriteria);
        return $this->db->update($this->getTable(), $data);
        // return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPelanggan', $id);
        return $this->db->delete($this->getTable());
    }
}