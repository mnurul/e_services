    <div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail jasa</h5>
        <div class="card-body">

            <?php foreach ($jasa as $js) : ?>
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?php echo base_url() . '/uploads/' . $js->gambar ?>"  class="img-thumbnail"> <!-- class="img-thumbnail utk mengecilkan gambar" -->
                    </div>

                    <div class="col-md-4">
                        <img src="<?php echo base_url() . '/uploads/' . $js->no_ktp ?>"  class="img-thumbnail">
                    </div>

                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Pekerja</td>
                                <td><strong><?php echo $js->nama_tkg ?></strong></td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td><strong><?php echo $js->alamat ?></strong></td>
                            </tr>

                             <tr>
                                <td>Tempat Tgl Lahir</td>
                                <td><strong><?php echo $js->tempat_tgl_lahir ?></strong></td>
                            </tr>

                            <tr>
                                <td>Umur</td>
                                <td><strong><?php echo $js->umur ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?php echo $js->keahlian ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $js->kategori ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td>
                                    <strong>
                                        <div class="btn btn-success btn-sm">Rp. <?php echo number_format($js->harga_tkg, 0, ',', '.') ?>
                                        </div>
                                    </strong>
                                </td>
                            </tr>

                        </table>

                        <?php echo anchor('admin/data_jasa/index', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>