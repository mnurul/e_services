<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <h3>Kabar Dari Tukang</h3>
            <img src="<?= base_url('assets/img/construction-worker.png'); ?> " width="150px">

            <form action="<?php echo base_url() . 'Customer/proses_bayar'; ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Status Tukang Saat ini</label>
                    <input type="text" name="status" placeholder="status" class="form-control" value="<?= $jasa['status']; ?>" readonly>
                </div>
            </form>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>