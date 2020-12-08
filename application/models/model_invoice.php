<?php

class Model_invoice extends CI_Model
{
	public function index()
	{
		// mensetig terlebih  zona waktu dahulu.
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$invoice = array(
			'nama' 		  => $nama,
			'alamat' 	  => $alamat,
			'tgl_pesan'   => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
			'status_pembayaran' => 'Menunggu Pembayaran',
			'id_customer' => $this->session->userdata('id_customer')
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'email' => $this->session->email,
				'id_invoice' => $id_invoice,
				'id_tkg'	 => $item['id'],
				'nama_tkg' 	 => $item['name'],
				'jumlah'	 => $item['qty'],
				// 'jumlah'	 => $item['keahlian'],
				'harga_tkg'		 => $item['price'],
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}


	public function tampil_data()
	{
		$result = $this->db->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}


	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function ambil_id_transaksi($id_invoice, $email)
	{
		$this->db->where('id_invoice', $id_invoice);
		$result = $this->db->where('email', $email)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function ambil_invoice()
	{
		$email = $this->db->where('email', $this->session->userdata('email'))->get('tb_user')->row_array();
		$customer_test = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();
		// $result = $this->db->where('id_customer', $email['id'])->get('tb_invoice');
		$result = $this->db->where('id_customer', $customer_test['id_customer'])->get('tb_invoice');

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function ambil_id_pembayaran()
	{
		$email = $this->db->where('email', $this->session->userdata('email'))->get('tb_user')->row_array();
		$result = $this->db->where('id_customer', $email['id'])->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
