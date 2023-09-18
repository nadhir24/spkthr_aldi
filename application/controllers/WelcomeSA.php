<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeSA extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(empty($_SESSION['username'])) {
			redirect(site_url('./loginKaryawan'));
		}

		if(empty($_SESSION['Super Admin'])) {
			$this->page->setTitle('Selamat Datang di SPK Penentuan THR');
			loadPage('layouts/index');
		}
		else {
			$this->page->setTitle('Selamat Datang di SPK Penentuan THR');
			loadPageSA('layoutsSA/index');
		}
	}
}
