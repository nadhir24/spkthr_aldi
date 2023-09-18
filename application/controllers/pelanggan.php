<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:42
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class pelanggan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['username'])) {
			redirect(site_url('./loginKaryawan'));
		}
        $this->page->setTitle('Pelanggan');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MPelanggan');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/pelanggan');
    }

    public function index()
    {
        $data['pelanggan'] = $this->MPelanggan->getAll();
        loadPage('pelanggan/index', $data);
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('pelanggan', '', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                    $pelanggan = $this->input->post('pelanggan');
                    $nilai = $this->input->post('nilai');

                    $this->MPelanggan->pelanggan = $pelanggan;
                    if ($this->MPelanggan->insert() == true) {
                        $success = false;
                        $kdPelanggan = $this->MPelanggan->getLastID()->kdPelanggan;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdPelanggan = $kdPelanggan;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->insert()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('pelanggan');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('pelanggan/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $this->db->trans_start();
                $kdPelanggan = $this->uri->segment(3, 0);
                // dump($kdPelanggan);
                if($kdPelanggan > 0){
                    $pelanggan = $this->input->post('pelanggan');
                    $nilai = $this->input->post('nilai');
                    $where = array('kdPelanggan' => $kdPelanggan);
                    $this->MPelanggan->pelanggan = $pelanggan;
                    // dump($pelanggan);
                    if($this->MPelanggan->update($where) == true){
                        $success = false;
                        foreach ($nilai as $item => $value) {
                            $this->MNilai->kdPelanggan = $kdPelanggan;
                            $this->MNilai->kdKriteria = $item;
                            $this->MNilai->nilai = $value;
                            if ($this->MNilai->update()) {
                                $success = true;
                            }
                        }
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            $this->db->trans_commit();
                            redirect('pelanggan');
                        } else {
                            $this->db->trans_rollback();
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['nilaiPelanggan'] = $this->MNilai->getNilaiByPelanggan($id);
            loadPage('pelanggan/tambah', $data);
        }

    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }

    public function delete($id)
    {
        if($this->MNilai->delete($id) == true){
            if($this->MPelanggan->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
            }
        }
    }
}