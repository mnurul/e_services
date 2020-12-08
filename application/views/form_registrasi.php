<!DOCTYPE html>

<!-- <body class="bg-gradient-primary"> -->
    <body class="bodi">
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stile.css'); ?>">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Tukang!</h1>
                                    </div>

                                    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= set_value('name'); ?>">
                                            <!-- membuat kode tulisan error pada nama  di register-->
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tempat_tgl_lahir" name="tempat_tgl_lahir" placeholder="" value="<?= set_value('tempat_tgl_lahir'); ?>">
                                            <!-- membuat kode tulisan error pada nama  di register-->
                                            <?= form_error('tempat_tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="5" id="alamat" name="alamat" rows="3" placeholder=""><?= set_value('alamat'); ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>No Telp</label>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="" value="<?= set_value('no_telp'); ?>">
                                            <!-- membuat kode tulisan error pada no_telp di register -->
                                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select class="form-control" name="agama" placeholder="Agama">
                                                <option value="">Pilih</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select class="form-control" name="jk" placeholder="jk">
                                                <option value="">Pilih</option>
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select>
                                            <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select class="form-control" name="pendidikan" placeholder="pendidikan">
                                                <option value="">Pilih</option>
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma">SMA</option>
                                                <option value="d3">D3</option>
                                                <option value="sarjana">Sarjana</option>
                                                <option value="dll">Dll</option>
                                            </select>
                                            <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Umur</label>
                                            <input type="text" class="form-control" id="umur" name="umur" placeholder="" value="<?= set_value('umur'); ?>">
                                            <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Keahlian</label>
                                            <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="" value="<?= set_value('keahlian'); ?>">
                                            <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>">
                                                <option value="">Pilih</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Perkakas">Perkakas</option>
                                                <option value="Tukang Bangunan">Tukang Bangunan</option>
                                                <option value="Tukang Ledeng">Tukang Ledeng</option>
                                            </select>
                                            <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Tarif/Harga</label>
                                            <input type="text" class="form-control" id="harga_tkg" name="harga_tkg" placeholder="" value="<?= set_value('harga_tkg'); ?>">
                                            <?= form_error('harga_tkg', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>


                                        <div class="form-group">
                                            <label>Foto Diri</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Full Name">
                                            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Foto KTP</label>
                                            <input type="file" class="form-control" id="no_ktp" name="no_ktp" placeholder="Foto Ktp">
                                            <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                            

                                        <div class="form-group">
                                            <label>Nama Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= set_value('email'); ?>">
                                            <!-- membuat kode tulisan error pada email di register -->
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/login'); ?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </html>