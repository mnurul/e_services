<div class="container-fluid">
    <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button> -->
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_jasa"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button>

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr class="text-center">
                <th>NO</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>UMUR</th>
                <th>J_K</th>
                <th>PENDIDIKAN</th>
                <th>AGAMA</th>
                <th>KEAHLIAN</th>
                <th>KATEGORI</th>
                <th>HARGA</th>
                <th>Gambar</th>
                <th>KTP</th>
                <th colspan="3">AKSI</th>
            </tr>

            <?php
            $no = 1;
            foreach ($jasa as $js) :
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $js->nama_tkg ?></td>
                    <td><?php echo $js->alamat ?></td>
                    <td><?php echo $js->umur ?></td>
                    <td><?php echo $js->jk ?></td>
                    <td><?php echo $js->pendidikan ?></td>
                    <td><?php echo $js->agama ?></td>
                    <td><?php echo $js->keahlian ?></td>
                    <td><?php echo $js->kategori ?></td>
                    <td><?php echo $js->harga_tkg ?></td>
                    <td><?php echo $js->gambar ?></td>
                     <td><?php echo $js->no_ktp ?></td>

                    <!-- tombol button -->
                    <td> <?php echo anchor('admin/Data_jasa/detail_jasa/' . $js->id_tkg, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/data_jasa/edit_jasa/' . $js->id_tkg, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/data_jasa/hapus_jasa/' . $js->id_tkg, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>

<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_jasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/data_jasa/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Pekerja</label>
                        <input type="text" name="nama_tkg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>alamat</label>
                        <input type="hidden" name="id_tkg" class="form-control" value="<?php echo $js->id_tkg ?>">
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Umur</label>
                        <input type="text" name="umur" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" value="<?php echo $js->jk ?>">
                            <option>Pilih</option>
                            <option>L</option>
                            <option>P</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama">
                            <option>Pilih</option>
                            <option>Islam</option>
                            <option>Katolik</option>
                            <option>Protestan</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keahlian</label>
                        <input type="text" name="keahlian" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" value="<?php echo $js->kategori ?>">
                            <option>Pilih</option>
                            <option>Electrical</option>
                            <option>Elektronik</option>
                            <option>Perkakas</option>
                            <option>Tukang Bangunan</option>
                            <option>Tukang Ledeng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga_tkg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>GAMBAR </label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>