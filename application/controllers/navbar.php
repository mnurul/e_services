<?php

class Navbar extends CI_Controller
{
    public function pendaftarkerja()
    {
        //membuat variabel data dan model
        // $data['electrical'] = $this->model_kategori->data_electrical()->result();
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('electrical', $data);
        // $this->load->view('templates/footer');

        $data['pendaftarkerja'] = $this->model_navbar->data_pendaftarkerja()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('electrical', $data);
        $this->load->view('templates/footer');
    }
}
