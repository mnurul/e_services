<?php

class Invoice extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '1') {
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
		$data['invoice'] = $this->model_invoice->tampil_data();

		$this->load->view('templatesadmin/header');
		$this->load->view('templatesadmin/sidebar');
		$this->load->view('admin/Invoice', $data);
		$this->load->view('templatesadmin/footer');
	}


	public function detail($id_invoice)
	{
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

		$this->load->view('templatesadmin/header');
		$this->load->view('templatesadmin/sidebar');
		$this->load->view('admin/Detail_invoice', $data);
		$this->load->view('templatesadmin/footer');
	}


	// public function cek_bukti($id_pembayaran)
	public function cek_bukti()
	{
		$data['title'] = 'Bayar';     // nama judul harus sama dengan nama yg d databases
		$data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran')->row_array();

		// $data['tb_invoice'] = $this->db->get_where('tb_invoice', ['id_customer' =>
		// $this->session->userdata('id_customer')])->row_array();

		// $data['pembayaran'] = $this->model_invoice->ambil_id_pembayaran($id_pembayaran);

		$this->load->view('templatesadmin/header');
		$this->load->view('templatesadmin/sidebar');
		$this->load->view('admin/Bukti_pembayaran', $data);
		$this->load->view('templatesadmin/footer');
	}
}
