<div class="container-fluid">
    <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button> -->
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_customer"><i class="fas fa-plus fa-sm"></i> Tambah Data Jasa </button>

    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr class="text-center">
                <th>NO</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>NO TELPON</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>GAMBAR</th>
                <th colspan="3">AKSI</th>
            </tr>

            <?php
            $no = 1;
            foreach ($customer as $cr) :
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $cr->nama ?></td>
                    <td><?php echo $cr->alamat ?></td>
                    <td><?php echo $cr->no_telp ?></td>
                    <td><?php echo $cr->email ?></td>
                    <td><?php echo $cr->password ?></td>
                    <td><?php echo $cr->gambar ?></td>

                    <!-- tombol button -->
                    <td> <?php echo anchor('admin/Data_customer/detail_customer/' . $cr->id_customer, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_customer/edit_customer/' . $cr->id_customer, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_customer/hapus_customer/' . $cr->id_customer, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>

<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/Data_customer/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>alamat</label>
                        <input type="hidden" name="id_customer" class="form-control" value="<?php echo $cr->id_customer ?>">
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="no_telp" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
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