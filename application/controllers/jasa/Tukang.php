<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukang extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';     // nama judul harus sama dengan nama yg d databases
        $data['tb_jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        $this->session->userdata('email')])->row_array(); //kalimat yg didalam tanda kurung merupakan induk dari hlaman yg berada di view...

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('jasa/Profile', $data);
        $this->load->view('templatesjasa/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile Tukang';     // nama judul harus sama dengan nama yg d databases
        $data['tb_jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array(); //utk mengirim data password yg berbbeda tabel dg tb_jasa

        // membuat rules utk name
        $this->form_validation->set_rules('nama_tkg', 'Full Name', 'required|trim');

        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesjasa/header', $data);
            $this->load->view('templatesjasa/sidebar', $data);
            $this->load->view('jasa/Edit', $data);
            $this->load->view('templatesjasa/footer');
        } else {
            $nama             = $this->input->post('nama_tkg');
            $tempat_tgl_lahir = $this->input->post('tempat_tgl_lahir');
            $alamat           = $this->input->post('alamat');
            $no_telp          = $this->input->post('no_telp');
            $agama            = $this->input->post('agama');
            $jk               = $this->input->post('jk');
            $pendidikan       = $this->input->post('pendidikan');
            $umur             = $this->input->post('umur');
            $keahlian         = $this->input->post('keahlian');
            $kategori         = $this->input->post('kategori');
            $harga_tkg        = $this->input->post('harga_tkg');
            $email            = $this->input->post('email');
            $password         = $this->input->post('password');
            // cek jika ada gambar yg akan diupload
            // $upload_image = $_FILES['image']['name'];
            $upload_image     = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['tb_jasa']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $upload_image     = $_FILES['no_ktp']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('no_ktp')) {        // mengupload image    
                    $old_image = $data['tb_jasa']['no_ktp'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('no_ktp', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_tkg', $nama);
            $this->db->set('tempat_tgl_lahir', $tempat_tgl_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('agama', $agama);
            $this->db->set('jk', $jk);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->set('umur', $umur);
            $this->db->set('keahlian', $keahlian);
            $this->db->set('kategori', $kategori);
            $this->db->set('harga_tkg', $harga_tkg);
            $this->db->where('email', $email);
            $this->db->update('tb_jasa');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('jasa/Tukang/profile');
        }
    }

    public function pesanan_t()
    {
        $data['title'] = 'Pesanan Masuk';     // nama judul harus sama dengan nama yg d databases
        $data['tb_surat'] = $this->db->get_where('tb_surat',  ['id_kurir' =>
        $this->session->userdata('id_user')])->row_array(); //kalimat yg didalam tanda kurung merupakan induk dari hlaman yg berada di view...

        // var_dump($this->session->userdata('name'));
        // $getNama = $this->session->userdata('name');
        // $this->db->select('*');
        // $this->db->from('tb_jasa');
        // $this->db->where('nama_tkg', $getNama);
        // $resultData = $this->db->get()->row_array();
        // var_dump($data['tb_surat']);
        // var_dump($getNama);
        // die();

        // kodingan dr bang den , tapi pesanan tampil semua di interface tukang  
        // $getNama = $this->session->userdata('name');
        $this->db->select('*');
        $this->db->from('tb_surat');
        // $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id_invoice');
        // $this->db->join('tb_customer', 'tb_invoice.id_customer = tb_customer.id_customer');
        $this->db->where('id_kurir', $this->session->userdata('id_user'));
        // $this->db->where('id_tkg', '1');
        $data['tampil'] = $this->db->get()->result();

        // var_dump($data);
        // die();

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        $this->load->view('jasa/Pesanan_t', $data);
        $this->load->view('templatesjasa/footer');
    }

    public function update($id)
    {
        $data['title'] = 'Update';     // nama judul harus sama dengan nama yg d databases
        $data['tb_surat'] = $this->db->get_where('tb_surat', ['id' =>
        $id])->row_array();

        // var_dump($id_invoice);
        // die();

        // $data['id_invoice'] = $id_invoice;

        // $data['tb_invoice'] = $this->db->get_where('tb_invoice', ['id_customer' =>
        // $this->session->userdata('id_customer')])->row_array();

        // $data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_customer' =>
        // $this->session->userdata('id_customer')])->row_array();
        // $data['invoice'] = $this->model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templatesjasa/header', $data);
        $this->load->view('templatesjasa/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('customer/update', $data);
        $this->load->view('templatesjasa/footer');
    }


    public function status_t()
    {
        $this->load->view('templatesjasa/header');
        $this->load->view('templatesjasa/sidebar');
        $this->load->view('jasa/Status_t');
        $this->load->view('templatesjasa/footer');
    }


    public function update_status_t()
    {
        $data['jasa'] = $this->model_jasa->update_status_t();
        $this->load->view('templatesjasa/header');
        $this->load->view('templatesjasa/sidebar');
        $this->load->view('jasa/Berita_t', $data);
        $this->load->view('templatesjasa/footer');
    }
}
