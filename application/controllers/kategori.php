<?php

class Kategori extends CI_Controller
{
	public function electrical()
	{
		//membuat variabel data dan model
		$data['electrical'] = $this->model_kategori->data_electrical()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('electrical', $data);
		$this->load->view('templates/footer');
	}


	public function elektronik()
	{
		//membuat variabel data dan model
		$data['elektronik'] = $this->model_kategori->data_elektronik()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('elektronik', $data);
		$this->load->view('templates/footer');
	}


	public function perkakas()
	{
		//membuat variabel data dan model
		$data['perkakas'] = $this->model_kategori->data_perkakas()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('perkakas', $data);
		$this->load->view('templates/footer');
	}


	public function tukang_bangunan()
	{
		//membuat variabel data dan model
		$data['bangunan'] = $this->model_kategori->data_bangunan()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('bangunan', $data);
		$this->load->view('templates/footer');
	}

	public function tukang_ledeng()
	{
		//membuat variabel data dan model
		$data['ledeng'] = $this->model_kategori->data_ledeng()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('ledeng', $data);
		$this->load->view('templates/footer');
	}
}
