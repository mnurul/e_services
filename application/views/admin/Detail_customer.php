<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail jasa</h5>
        <div class="card-body">

            <?php foreach ($customer as $cr) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url().'assets/img/profile/' . $cr->gambar ?>" class="card-img-top">
                    </div>

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Customer</td>
                                <td><strong><?php echo $cr->nama ?></strong></td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td><strong><?php echo $cr->alamat ?></strong></td>
                            </tr>

                            <tr>
                                <td>No Telp</td>
                                <td><strong><?php echo $cr->no_telp ?></strong></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><strong><?php echo $cr->email ?></strong></td>
                            </tr>

                            <tr>
                                <td>Password</td>
                                <td><strong><?php echo $cr->password ?></strong></td>
                            </tr>

                        </table>

                        <?php echo anchor('admin/data_customer/index', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>