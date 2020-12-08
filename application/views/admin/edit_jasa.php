<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PEKERJA</h3>

    <?php foreach ($jasa as $js) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/data_jasa/update' ?>" enctype="multipart/form-data">

            <div class="for-group">
                <label>Nama Pegawai</label>
                <input type="text" name="nama_tkg" class="form-control" value="<?php echo $js->nama_tkg ?>">
            </div>

            <div class="for-group">
                <label>alamat</label>
                <input type="hidden" name="id_tkg" class="form-control" value="<?php echo $js->id_tkg ?>">
                <input type="text" name="alamat" class="form-control" value="<?php echo $js->alamat ?>">
            </div>

            <div class="for-group">
                <label>Umur</label>
                <input type="text" name="umur" class="form-control" value="<?php echo $js->umur ?>">
            </div>

            <div class="for-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" name="jk" value="<?php echo $js->jk ?>">
                    <option value="Pilih">Pilih</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="for-group">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control" value="<?php echo $js->pendidikan ?>">
            </div>

            <div class="for-group">
                <label for="agama">Agama</label>
                <select class="form-control" name="agama" value="<?php echo $js->agama ?>">
                    <option value="Pilih">Pilih</option>
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                </select>
            </div>

            <div class="for-group">
                <label>Keahlian</label>
                <input type="text" name="keahlian" class="form-control" value="<?php echo $js->keahlian ?>">
            </div>

            <div class="for-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori" value="<?php echo $js->kategori ?>">
                    <option value="Pilih">Pilih</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Perkakas">Perkakas</option>
                    <option value="Tukang Bangunan">Tukang Bangunan</option>
                    <option value="Tukang Ledeng">Tukang Ledeng</option>
                </select>
                <!-- <input type=" text" name="kategori" class="form-control" value="<?php echo $js->kategori ?>"> -->
            </div>

            <div class="for-group">
                <label>Harga</label>
                <input type="text" name="harga_tkg" class="form-control" value="<?php echo $js->harga_tkg ?>">
            </div>

            <div class="form-group">
                <label>GAMBAR </label>
                <input type="file" name="gambar" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

        </form>
    <?php endforeach; ?>
</div>