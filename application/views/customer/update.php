<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<h3>Update Surat Masuk</h3>

			<form action="<?php echo base_url() . 'Customer/proses_bayar'; ?>" enctype="multipart/form-data" method="post">
				<!-- <form action="<?php echo base_url() . 'dashboard/histori_pesanan'; ?>" method="post"> -->


				<!-- <div class="form-group">
					<label>ID CUSTOMER</label>
					<input type="text" name="id_customer" placeholder="Id Customer" class="form-control" value="" readonly>
				</div> -->

				<div class="form-group">
					<label>No.AWB</label>
					<input type="text" name="no_awb" id="no_awb" class="form-control" value="<?= $tb_surat['no_awb']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Upload Foto Penerima </label>
					<input type="file" class="form-control" id="foto_penerima" name="foto_penerima" placeholder="Foto Penerima">
				</div>
				<div class="form-group">
					<label>Upload Foto Lokasi </label>
					<input type="file" class="form-control" id="foto_lokasi" name="foto_lokasi" placeholder="Foto Lokasi">
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
				<a href="<?php echo base_url('jasa/Tukang/pesanan_t/') ?>" class="btn btn-danger btn-sm mt-3">Batal</a>

				<!-- <a href="<?php echo base_url('welcome') ?>">
					<div class="btn btn-danger btn-sm mt-3"> Batal </div>
				</a> -->
			</form>

		</div>

		<div class="col-md-2"></div>
	</div>
</div>