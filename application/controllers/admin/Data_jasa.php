<?php

class Data_jasa extends CI_Controller
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
        $data['jasa'] = $this->model_jasa->tampil_data()->result();
        $this->load->view('templatesadmin/header');
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/Data_jasa', $data);
        $this->load->view('templatesadmin/footer');
    }


    public function tambah_aksi()
    {
        $nama_tkg       = $this->input->post('nama_tkg');
        $alamat         = $this->input->post('alamat');
        $umur           = $this->input->post('umur');
        $jk             = $this->input->post('jk');
        $pendidikan     = $this->input->post('pendidikan');
        $agama          = $this->input->post('agama');
        $keahlian       = $this->input->post('keahlian');
        $kategori       = $this->input->post('kategori');
        $harga_tkg      = $this->input->post('harga_tkg');
        $gambar     =  $_FILES['gambar']['name'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_tkg'       => $nama_tkg,
            'alamat'         => $alamat,
            'umur'           => $umur,
            'jk'             => $jk,
            'pendidikan'     => $pendidikan,
            'agama'          => $agama,
            'keahlian'       => $keahlian,
            'kategori'       => $kategori,
            'harga_tkg'      => $harga_tkg,
            'gambar'         => $gambar
        );

        $this->model_jasa->tambah_jasa($data, 'tb_jasa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah jasa Success!!</div>');
        redirect('admin/data_jasa/index');
    }


    public function detail_jasa($id)
    {
        $where = array('id_tkg' => $id);
        $data['jasa'] = $this->model_jasa->detail_jasa_admin($id);
        $this->load->view('templatesadmin/header');
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/detail_jasa', $data);
        $this->load->view('templatesadmin/footer');
    }


    public function edit_jasa($id)
    {
        $where = array('id_tkg' => $id);
        $data['jasa'] = $this->model_jasa->edit_jasa($where, 'tb_jasa')->result();
        $this->load->view('templatesadmin/header');
        $this->load->view('templatesadmin/sidebar');
        $this->load->view('admin/edit_jasa', $data);
        $this->load->view('templatesadmin/footer');
    }


    public function update()
    {
        $id_tkg         = $this->input->post('id_tkg');
        $nama_tkg       = $this->input->post('nama_tkg');
        $alamat         = $this->input->post('alamat');
        $umur           = $this->input->post('umur');
        $jk             = $this->input->post('jk');
        $pendidikan     = $this->input->post('pendidikan');
        $agama          = $this->input->post('agama');
        $keahlian       = $this->input->post('keahlian');
        $kategori       = $this->input->post('kategori');
        $harga_tkg      = $this->input->post('harga_tkg');
        $gambar         =  $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_tkg'       => $nama_tkg,
            'alamat'         => $alamat,
            'umur'           => $umur,
            'jk'             => $jk,
            'pendidikan'     => $pendidikan,
            'agama'          => $agama,
            'keahlian'       => $keahlian,
            'kategori'       => $kategori,
            'harga_tkg'      => $harga_tkg,
            'gambar'         => $gambar
        );

        $where = array(
            'id_tkg' => $id_tkg
        );

        // $this->model_jasa->update_data($where, $data, 'tb_jasa');
        if ($this->model_jasa->update_jasa($where, $data, 'tb_jasa')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update jasa Success!!</div>');
            redirect('admin/data_jasa/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update jasa Gagal!!</div>');
            redirect('admin/data_jasa/index');
        }
    }


    public function hapus_jasa($id)
    {
        $where = array('id_tkg' => $id);
        $this->model_jasa->hapus_data($where, 'tb_jasa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete jasa Success!!</div>');
        redirect('admin/data_jasa/index');
    }
}
