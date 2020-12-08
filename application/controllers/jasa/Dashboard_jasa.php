<?php

class Dashboard_jasa extends CI_Controller{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('role_id') != '2') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}
	 

	public function index() 
	{
		$this->load->view('templatesjasa/header');
		$this->load->view('templatesjasa/sidebar');
		$this->load->view('jasa/Dashboard_jasa');
		$this->load->view('templatesjasa/footer');

	}
}
?>

