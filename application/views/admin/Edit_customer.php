<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA CUSTOMER</h3>

    <?php foreach ($customer as $cr) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/Data_customer/update' ?>" enctype="multipart/form-data">

            <div class="for-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $cr->nama ?>">
            </div>

            <div class="for-group">
                <label>alamat</label>
                <input type="hidden" name="id_customer" class="form-control" value="<?php echo $cr->id_customer ?>">
                <input type="text" name="alamat" class="form-control" value="<?php echo $cr->alamat ?>">
            </div>

            <div class="for-group">
                <label>No Telp</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $cr->no_telp ?>">
            </div>

            <div class="for-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $cr->email ?>">
            </div>

            <div class="for-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo $cr->password ?>">
            </div>

            <div class="form-group">
                <label>GAMBAR </label>
                <input type="file" name="gambar" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

        </form>
    <?php endforeach; ?>
</div>