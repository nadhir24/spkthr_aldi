<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "phpmailer/classes/class.phpmailer.php";

class Daftar_Karyawan extends CI_Controller {

	public function index()
	{
		$this->load->view('daftar_karyawan');
	}


	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_daftar_karyawan");
		//$this->load->library('session');
	}

	public function tambah(){
		$user = $this->model_daftar_karyawan;
		$result = $user->save();
		if ($result > 0) {
			$this->sukses();
		}else{
			$this->gagal();
		}
		$result = $this->model_daftar_karyawan->cekemail($email);
		
	}

	public function sendEmail($email, $username, $password, $nama, $kode) {
		$post = $this->input->post();
		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->SMTPSecure = 'tls';
		$mail->Host = "smtp.gmail.com"; //hostname masing-masing provider email
		//$mail->SMTPDebug = 2;
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->Username = "alifya.ngusma@gmail.com"; //user email
		$mail->Password = "GymSI2019"; //password email
		$mail->SetFrom("alifya.ngusma@gmail.com","tienskaryawan"); //set email pengirim
		$mail->Subject = "Pendaftaran Member GymSI"; //subyek email
		$mail->AddAddress($email, $nama); //tujuan email
		$tgl = date('d');
		$dat = $tgl + 1;
		$body = "Hai, ".$nama."<br/>Selamat Bergabung dengan Tiens Syariah <br/> Username : ".$username."<br/>Password : ".$password."<br/>Terima Kasih Telah bergabung Dengan Kam<br/>";
		$mail->Body = $body;
		$mail->AltBody = $body;
		$mail->Send();
	}

	

	function sukses(){
		echo "<script>alert('submitted successfully!')</script>";
        //redirect(site_url('user_lihat'));
        redirect(site_url('daftar_karyawan'));
	}

	function gagal(){
		echo "<script>alert('Input data gagal')</script>";
	}

}
