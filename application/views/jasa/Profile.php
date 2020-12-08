<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card  mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('uploads/') . $tb_jasa['gambar']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <h5 class="card-title"> <?= $tb_jasa['nama_tkg']; ?> </h5>
                 <p class="card-text"> <?= $tb_jasa['keahlian']; ?> </p>
                 <p class="card-text"> <?= $tb_jasa['kategori']; ?> </p>
                 <p class="card-text"> <?= $tb_jasa['email']; ?> </p>
                 <p class="card-text"> <small class="text-muted">
                        Bergabung pada <?= date('d F Y', $tb_user['date_created']); ?>
                    </small></p>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content