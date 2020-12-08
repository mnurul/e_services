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
                    <h1 class="h4 text-gray-900 mb-4">Buat Account Pelanggan!</h1>
                  </div>

                  <form class="user" method="post" action="<?= base_url('auth/registration_pelanggan'); ?>" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= set_value('name'); ?>">
                      <!-- membuat kode tulisan error pada nama  di register-->
                      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
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
                      <label>Nama Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= set_value('email'); ?>">
                      <!-- membuat kode tulisan error pada email di register -->
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0"><label>Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="col-sm-6"><label>Repeat Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Foto Diri</label>
                      <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Full Name" >
                      <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <a class="small" href="<?= base_url('auth/login'); ?>">Sudah memiliki akun? Login!</a>
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