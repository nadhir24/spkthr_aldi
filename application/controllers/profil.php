<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class profil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['username'])) {
			redirect(site_url('./loginKaryawan'));
		}
        $this->page->setTitle('profil');
        $this->load->model('Mprofil');
        $this->page->setLoadJs('assets/js/profil');
        $this->load->library('session');
    }

   
    public function index ()
    {
        $akunkaryawanadmin["akunkaryawanadmin"] = $this->Mprofil->getAll();
        loadPage('profilKA/index',$akunkaryawanadmin);
    }

    public function edit()
		{
			$Pfungsi = $this->Mprofil->editakunkaryawanadmin();
	        if(!$Pfungsi)
	        {
	            echo "<script>alert('Data Berhasil Ter-Update')</script>";
	            redirect(base_url('profil'));
	        }
	        else
	        {
	            echo "<script>alert('Data Gagal Ter-Update')</script>";
	            redirect(base_url('profil'));
	        }
		}

   
}