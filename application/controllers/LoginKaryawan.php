<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginKaryawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("materi_security_model_karyawan");
	}

	public function index()
	{
		$this->load->view('loginKaryawan');
	}

	public function ceklogin()
	{
		$post = $this->input->post();
		if(isset($post["nama_karyawan"]) && isset($post["password"]))
		{
			//cek user
			$user = $this->materi_security_model_karyawan;
			$data = $user->getByUsernamePassword();
			
			if($data != null){
				$username = $data->username;
				$name = $data->nama_karyawan;
				$role = $data->role;
				$password = $data->password;
				$foto = $data->foto;

				//adding data to session
				$newdata = array(
					'username' => $username,
					'nama_karyawan' => $name,
					'role' => $role,
					'foto' => $foto
				);

				$this->session->set_userdata($newdata);
				if($role == "1"){
					//redirect(site_url('dashboard'));
					session_start();
			  			$_SESSION['username'] = $username;
			 		    $_SESSION['Admin'] = $role;
			  			//setcookie("y-cookie",$row['username'],time()+3600);
			  			//setcookie("x-cookie",$row['nama'],time()+3600);
						redirect(site_url('./Welcome'));
				}
				else if($role == "2") //Pelanggan
					{
						session_start();
			  			$_SESSION['username'] = $username;
			 		    $_SESSION['Super Admin'] = $role;
			  			//setcookie("y-cookie",$row['username'],time()+3600);
			  			//setcookie("x-cookie",$row['nama'],time()+3600);
						redirect(site_url('./WelcomeSA'));
					}
			}
			else{
				echo "<script>alert('User atau Password tidak terdaftar');</script>";
				$this->load->view('loginKaryawan');
			}	
			
		}
		else{
			echo "<script>alert('Fill username and password');</script>";
			$this->load->view('loginKaryawan');
		}
	}
}
?>
