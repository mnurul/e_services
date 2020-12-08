<?php

class Dashboard extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}


	public function tambah_ke_pesan($id)
	{
		$jasa = $this->model_jasa->find($id);

		// cara untuk Menambahkan jasa ke keranjang belanja
		$data = array(
			'id'      => $jasa->id_tkg,
			'qty'     => 1,
			'price'   => $jasa->harga_tkg,
			'name'    => $jasa->nama_tkg
		);

		$this->cart->insert($data);
		redirect('welcome');
	}


	// public function detail_keranjang()
	public function detail_pesan()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		// $this->load->view('keranjang');
		$this->load->view('pesanan');
		$this->load->view('templates/footer');
	}


	public function hapus_keranjang()
	{
		// cart berfungsi untuk pembelian(keranjang)
		$this->cart->destroy();
		redirect('welcome');
	}


	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
		
	}


	public function proses_pesanan()
	{
		// mengirim data pesanan ke invoice
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal Diproses!";
		}
	}

	// kodingan ini berujuk pada proses_pesanan, jika kodingan ini tdk dipakai maka gunakan yg diatas
	public function histori_pesanan()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('proses_pesanan');
		$this->load->view('templates/footer');
	}


	public function detailnya($id_tkg)
	{
		$data['jasa'] = $this->model_jasa->detail_jasa($id_tkg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_jasa', $data);
		$this->load->view('templates/footer');
	}
}
