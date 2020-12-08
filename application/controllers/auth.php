<?php

class Auth extends CI_Controller
{

    public function index()
    {
        // membuat session login/registrasi...fungsinya setelah masuk ke halaman user tdk bisa menulis url ke halaman auth....agar tetap di halaman
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }

        //membuat rules utk email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        // membuat rules utk password
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/header', $data);
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            // validasinya success
            $this->login();
        }
    }

    public function login()
    {
        // membuat form validation untuk username dan password
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            $auth_customer = $this->model_auth->cek_customer();

            // var_dump($auth_customer);
            // die();


            if ($auth->is_active == "0") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email Belum Diaktifkan Silahkan aktifkan!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                redirect('auth/login');
                // die();

            }

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Email atau Password Anda Salah!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('is_login', true);

                // switch ($auth->role_id) {
                //     case 1:
                //         redirect('admin/dashboard_admin');
                //         break;

                //     case 2:
                //         redirect('welcome');
                //         break;
                //     default:
                //         break;
                // }
                if ($auth->role_id == "1") {
                    $cek = $this->model_auth->data_level_1($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('name', $val->name);
                    }
                    redirect('admin/dashboard_admin');
                } else if ($auth->role_id == "2") {
                    $cek = $this->model_auth->data_level_2($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('name', $val->nama_tkg);
                    }
                    $this->session->set_userdata('id_user', $auth->id);
                    redirect('jasa/Dashboard_jasa');
                } else if ($auth->role_id == "3") {
                    $cek = $this->model_auth->data_level_3($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('name', $val->nama);
                        $this->session->set_userdata('alamat', $val->alamat);
                        $this->session->set_userdata('no_telp', $val->no_telp);
                        $this->session->set_userdata('email', $val->email);
                    }
                    $this->session->set_userdata('id_customer', $auth_customer->id_customer);

                    // redirect(base_url(''));
                    redirect(base_url('Dashboard_c'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Username atau Password Anda Salah!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    redirect('auth/login');
                }
            }
        }
    }

    public function pilih()
    {
        $data['title'] = "Pilih Register";
        $this->load->view('templates/header', $data);
        $this->load->view('pilih_registrasi');
        $this->load->view('templates/footer');
    }


    public function registration()
    {
        // membuat session login/registrasi...fungsinya setelah masuk ke halaman user tdk bisa menulis url ke halaman auth....agar tetap di halaman
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }

        // membuat rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('tempat_tgl_lahir', 'TTL', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('jk', 'jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required|trim');
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        $this->form_validation->set_rules('harga_tkg', 'harga tkg', 'required|trim');
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Foto', 'required');
        }
        if (empty($_FILES['no_ktp']['name'])) {
            $this->form_validation->set_rules('no_ktp', 'No ktp', 'required');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        // print_r($_FILES);
        // die;
        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/header', $data);
            $this->load->view('form_registrasi');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            // data dibawah ini akan dikirim ke tb_user, maka dari itu samakan dgn filed yg ada di tb_user...oke
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

            $ktp         =  $_FILES['no_ktp']['name'];
            if ($ktp = '') {
            } else {
                $config['upload_path']   = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('no_ktp')) {
                    echo "Gambar ktp Gagal Diupload!";
                } else {
                    $ktp = $this->upload->data('file_name');
                }
            }

            $data = [
                'email'        => htmlspecialchars($email),
                'name'         => htmlspecialchars($this->input->post('name', true)),
                'password'     => $this->input->post('password1'),
                'role_id'      => 2,
                // 'is_active' => 1,
                'is_active'    => 0,
                'date_created' => time(),
                'gambar'       => $gambar,
            ];

            //Tambahin seperti $data diatas
            // $email = $this->input->post('email', true);
            $data_tb_user = [
                'nama_tkg'         => htmlspecialchars($this->input->post('name', true)),
                'tempat_tgl_lahir' => $this->input->post('tempat_tgl_lahir'),
                'alamat'           => $this->input->post('alamat'),
                'no_telp'          => $this->input->post('no_telp'),
                'agama'            => $this->input->post('agama'),
                'jk'               => $this->input->post('jk'),
                'pendidikan'       => $this->input->post('pendidikan'),
                'umur'             => $this->input->post('umur'),
                'keahlian'         => $this->input->post('keahlian'),
                'kategori'         => $this->input->post('kategori'),
                'harga_tkg'        => $this->input->post('harga_tkg'),
                'gambar'           => $gambar,
                'no_ktp'           => $ktp,
                'email'            => htmlspecialchars($email),
            ];

            // menyiapkan token dan dibungkus dengan base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'        => $email,
                'token'        => $token,
                'date_created' => time()
            ];

            // menambahkan data pada saat user registrasi ke table user
            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_jasa', $data_tb_user);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');    // verify dpt darimana?

            // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
            redirect('auth/login');
        }
    }


    public function registration_pelanggan()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/header', $data);
            $this->load->view('form_registration_pelanggan');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'email' => htmlspecialchars($email),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'gambar' => 'default.jpg',
                'password' => $this->input->post('password1'),
                'role_id' => 3,
                // 'is_active' a/ on off pada login jika 0 mati, jika 1 hidup,
                'is_active' => 0,
                'date_created' => time()
            ];

            //Tambahin seperti $data diatas
            $email = $this->input->post('email', true);
            $data_tb_customer = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => htmlspecialchars($email),
                'password' => $this->input->post('password1'),
                'gambar' => 'default.jpg',
                // 'role_id' => 2,
                // // 'is_active' => 1,
                // 'is_active' => 0,
                // 'date_created' => time()
            ];

            // menyiapkan token dan dibungkus dengan base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            // menambahkan data pada saat user registrasi ke table user
            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_customer', $data_tb_customer);
            $this->db->insert('user_token', $user_token);
            // if ($this->_sendEmail($token, 'verify')) {
            //     echo "Kirim";
            //     die();
            // } else {
            //     echo "tidak";
            // }



            $this->_sendEmail($token, 'verify');    // verify dpt darimana?

            // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
            redirect('auth/login');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            // 'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'mehrief77@gmail.com',
            'smtp_pass' => 'romawi123',
            'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        // memanggil library email dan membutuhkan parameternya di ci
        $this->load->library('email', $config);
        // sintax ini utuk mengirim email aktiv dari registrasi yg baru di buat!!!!
        $this->email->initialize($config);

        // siapkan email dan memberitahu email itu dikirim dari siapa
        $this->email->from('mehrief77@gmail.com', 'Mehmet Arief');
        $this->email->to($this->input->post('email'));

        // verify ini sama dengan yg ada di atas(sendEmail), cek verifikasi
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');  //sintax ini utk membuat link aktivasi ke gmail
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset you password : <a href="' . base_url() . 'auth/resetpassword?email=' .
                $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');  //sintax ini utk membuat link aktivasi ke gmail
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;  //jangan pake die....jadi error saat ngirim email
            // echo $this->email->print_debugger();
        }
    }

    // function ini yg akan melakukan verifikasi terhadap link yg dikirim dari email, tentang nomer token dan email didatabase(user_token)
    public function verify()
    {
        $email = $this->input->get('email');     //ngambil data yg ada di database melalui input 
        $token = $this->input->get('token');
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();     // Membuat variabel(inisial $user) dan mengambil data email dari tabel user. 
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();     // membuat variabel(inisial $user_token) dan mengambil data token dari tabel user_token. 
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //utk mengecek waktu saat aktivasi expired atau tdk, 
                    $this->db->set('is_active', 1);   //jika menggunakan query bilder, merubah is_aktive dari 0 menjadi 1.
                    $this->db->where('email', $email);
                    // $this->db->update('user');
                    $this->db->update('tb_user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    // menghapus user yg expired di masing" tabel
                    // $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! TOKEN EXPIRED!!!.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG TOKEN!!!.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG EMAIL!!!.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        // sess_destroy digunakan untuk menghancurkan session yg sudah masuk
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
