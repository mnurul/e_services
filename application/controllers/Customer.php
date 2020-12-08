<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer/Profile', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title']     = 'Edit Profile Customer';     // nama judul harus sama dengan nama yg d databases
        $data['customer']  = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        // membuat rules utk name
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('customer/Edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $id_customer = $this->input->post('id_customer');
            $nama     = $this->input->post('nama');
            $alamat   = $this->input->post('alamat');
            $no_telp  = $this->input->post('no_telp');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            // cek jika ada gambar yg akan diupload
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['customer']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        // unlink(FCPATH . 'assets/img/profile/' . $old_image);
                        unlink(FCPATH . '/assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->where('email', $email);
            $this->db->set('password', $password);
            $this->db->update('tb_customer');

            $this->db->where('email', $email); //menggunakan email sbg parameter utk merubah password di kedua table yg berbeda
            $this->db->set('password', $password);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('Customer/profile');
        }
    }


    public function detail($id_invoice)
    {
        $data['title']       = 'Transaksi';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($id_invoice, $this->session->email);

        $getIdTkg = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();

        $this->session->set_userdata('id_tkg', $getIdTkg['id_tkg']);

        // $idTkg = $this->session->userdata('id_tkg');

        // var_dump($data['pesanan']);
        // var_dump($getIdTkg['id']);
        // var_dump($idTkg);
        // die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer/Detail_transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer/Transaksi', $data);
        $this->load->view('templates/footer');
    }


    public function bayar($id_invoice)
    {
        $data['title'] = 'Bayar';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        // var_dump($id_invoice);
        // die();

        $data['id_invoice'] = $id_invoice;

        $data['tb_invoice'] = $this->db->get_where('tb_invoice', ['id_customer' =>
        $this->session->userdata('id_customer')])->row_array();

        // $data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_customer' =>
        // $this->session->userdata('id_customer')])->row_array();
        // $data['invoice'] = $this->model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('customer/Bayar', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $data['title'] = 'Update';     // nama judul harus sama dengan nama yg d databases
        // $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        // $this->session->userdata('email')])->row_array();

        // var_dump($id_invoice);
        // die();

        // $data['id_invoice'] = $id_invoice;

        // $data['tb_invoice'] = $this->db->get_where('tb_invoice', ['id_customer' =>
        // $this->session->userdata('id_customer')])->row_array();

        // $data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_customer' =>
        // $this->session->userdata('id_customer')])->row_array();
        // $data['invoice'] = $this->model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('customer/update', $data);
        $this->load->view('templates/footer');
    }

    public function proses_bayar()
    {
        // mengirim data pesanan ke invoice

        $data = array(
            'id_invoice' => $this->input->post('id_invoice'),
            'id_customer' => $this->input->post('id_customer'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'metode' => $this->input->post('metode'),
            'bkt_transaksi' => $this->_pr_upload_gambar()
        );

        $this->db->insert('tb_pembayaran', $data);

        $data_inv = array(
            'status_pembayaran' => 'lunas'
        );

        $this->db->where('id_invoice', $this->input->post('id_invoice'));
        $this->db->update('tb_invoice', $data_inv);
        redirect('Customer/transaksi');

        // $is_processed = $this->model_invoice->index();
        // if ($is_processed) {
        //     redirect('Customer/transaksi');
        // }
    }

    public function _pr_upload_gambar($foto_lama = null)
    {
        if (!empty($_FILES['bkt_transaksi']['name'])) {
            $nmfile = md5($_FILES['bkt_transaksi']['name']);
            $config['upload_path']          = './uploads/bkt_transaksi';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['file_name']            = $nmfile;
            $config['overwrite']            = true;
            $config['max_size']             = 2024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bkt_transaksi')) {
                return $this->upload->data("file_name");
            }

            return "default.png";
        } else {
            return $foto_lama;
        }
    }


    public function berita_t()
    {
        $data['title'] = 'Transaksi';     // nama judul harus sama dengan nama yg d databases
        $data['jasa'] = $this->db->get_where('tb_jasa', ['id_tkg' => 36])->row_array();
        // $data['jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // $data['getTkg'] = $this->db->get_where('tb_pesanan', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // var_dump($data['getTkg']);
        // var_dump($this->session->userdata('email'));
        var_dump($this->session->userdata('id_tkg'));
        die();

        // $getNama = $this->session->userdata('name');
        // $this->db->select('*');
        // $this->db->from('tb_customer');
        // $this->db->where('nama', $getNama);
        // $resultData = $this->db->get()->row_array();
        // var_dump($data['jasa']);
        // die();

        // // kodingan dr bang den , tapi pesanan tampil semua di interface tukang  
        // $getNama = $this->session->userdata('name');
        // $this->db->select('status');
        // $this->db->from('tb_jasa');
        // $this->db->where('id_tkg');
        // // $this->db->where('id_tkg', $resultData['id_tkg']);
        // $data['jasa'] = $this->db->get()->result();
        // var_dump($data['jasa']);
        // die();



        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('customer/Berita_t', $data);
        $this->load->view('templates/footer');
    }
}
