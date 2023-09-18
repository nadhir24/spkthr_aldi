<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class profilSA extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['username'])) {
			redirect(site_url('./loginKaryawan'));
		}
        $this->page->setTitle('profilSA');
        $this->load->model('MprofilSA');
        $this->page->setLoadJs('assets/js/profilSA');
        $this->load->library('session');
    }

   
    public function index()
    {
        $akunkaryawanadminSA["akunkaryawanadminSA"] = $this->MprofilSA->getAllSA();
        $akunkaryawanadminSA["allakunkaryawanadminSA"] = $this->MprofilSA->getAll();
        loadPageSA('profilKASA/indexSA',$akunkaryawanadminSA);
    }

    public function viewEditKaryawan($id) {
        $dataKaryawan['dataKaryawan'] = $this->MprofilSA->getKaryawanById($id);
        loadPage('profilKASA/editKASA', $dataKaryawan);
    }
    
    public function deleteKaryawan($id)
    {
        if($this->MprofilSA->delete($id) == true){
            $this->session->set_flashdata('message','Berhasil menghapus data :)');
        }

        redirect(base_url('profilSA'));
    }

    public function viewTambahKaryawan() {
        loadPage('profilKASA/tambahKASA');
    }

    public function tambahKaryawan() {
        $idKaryawan = $this->input->post('idKaryawan');
        $usernameKaryawan = $this->input->post('usernameKaryawan');
        $namaKaryawan = $this->input->post('namaKaryawan');
        $passKaryawan = $this->input->post('passKaryawan');
        $roleKaryawan = $this->input->post('roleKaryawan');

        $postData = [
            'id_karyawan' => $idKaryawan,
            'username' => $usernameKaryawan,
            'nama_karyawan' => $namaKaryawan,
            'password' => $passKaryawan,
            'role' => $roleKaryawan
        ];

        $postDataSaved = $this->MprofilSA->insertKaryawan($postData);

        $this->session->set_flashdata('message','Berhasil tambah data :)');
        redirect(base_url('profilSA'));
    }

    public function editKaryawan() {
        $idKaryawan = $this->input->post('idKaryawan');
        $usernameKaryawan = $this->input->post('usernameKaryawan');
        $namaKaryawan = $this->input->post('namaKaryawan');
        $passKaryawan = $this->input->post('passKaryawan');
        $roleKaryawan = $this->input->post('roleKaryawan');

        $postData = [
            'id_karyawan' => $idKaryawan,
            'username' => $usernameKaryawan,
            'nama_karyawan' => $namaKaryawan,
            'password' => $passKaryawan,
            'role' => $roleKaryawan
        ];

        $where = array('id_karyawan' => $idKaryawan);

        $postDataSaved = $this->MprofilSA->updateKaryawan($postData, $where);

        $this->session->set_flashdata('message','Berhasil edit data :)');
        redirect(base_url('profilSA'));
    }

    public function edit()
		{
			$Pfungsi = $this->MprofilSA->editakunkaryawanadminSA();
	        if(!$Pfungsi)
	        {
	            echo "<script>alert('Data Berhasil Ter-Update')</script>";
	            redirect(base_url('profilSA'));
	        }
	        else
	        {
	            echo "<script>alert('Data Gagal Ter-Update')</script>";
	            redirect(base_url('profilSA'));
	        }
		}

   
}