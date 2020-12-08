<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- form ada inputan file, kalo mau uplod gambar atributnya harus ada 3 -->
            <!-- <form action="" method="" enctype="multipart/multipart/form-data"> -->
            <!-- <?= form_open_multipart('Tukang/edit'); ?> -->

            <?= form_open_multipart('jasa/Tukang/edit'); ?>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_tkg" name="nama_tkg" value="<?= $tb_jasa['nama_tkg']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tempat TGL Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_tgl_lahir" name="tempat_tgl_lahir" value="<?= $tb_jasa['tempat_tgl_lahir']; ?>">
                    <?= form_error('tempat_tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <!-- utk text area, tidak usah menggunakan value -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="alamat" name="alamat" autofocus=""><?= $tb_jasa['alamat']; ?>
                    </textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $tb_jasa['no_telp']; ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <select class="form-control" name="agama" placeholder="Agama" value="<?= $tb_jasa['agama']; ?>">
                        <option value="">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" id="jk" name="jk" placeholder="jk" value="<?= $tb_jasa['jk']; ?>">
                        <option value="">Pilih</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Pendidikan</label>
                <div class="col-sm-10">
                    <select class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan" value="<?= $tb_jasa['pendidikan']; ?>">
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
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="umur" name="umur" value="<?= $tb_jasa['umur']; ?>">
                    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Keahlian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keahlian" name="keahlian" value="<?= $tb_jasa['keahlian']; ?>">
                    <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-control" id="kategori" name="kategori" placeholder="kategori" value="<?= $tb_jasa['kategori']; ?>">
                        <option value="">Pilih</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Perkakas">Perkakas</option>
                        <option value="Tukang Bangunan">Tukang Bangunan</option>
                        <option value="Tukang Ledeng">Tukang Ledeng</option>
                    </select>
                    <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Harga/Tarif</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga_tkg" name="harga_tkg" value="<?= $tb_jasa['harga_tkg']; ?>">
                    <?= form_error('harga_tkg', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <!--  thumbnail, supaya gambarnya menjadi kecil -->
                           <!--  <img src="<?= base_url('assets/img/profile/') . $tb_jasa['gambar']; ?>" class="img-thumbnail"> -->
                            <img src="<?= base_url('uploads/') . $tb_jasa['gambar']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label for="gambar" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">KTP</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <!--  thumbnail, supaya gambarnya menjadi kecil -->
                           <!--  <img src="<?= base_url('assets/img/profile/') . $tb_jasa['no_ktp']; ?>" class="img-thumbnail"> -->
                            <img src="<?= base_url('uploads/') . $tb_jasa['no_ktp']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="no_ktp" name="no_ktp">
                                <label for="no_ktp" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $tb_jasa['email']; ?>" readonly>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="password" value="<?= $tb_user['password']; ?>">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>

        </div>

    </div>
</div>