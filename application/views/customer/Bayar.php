<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<h3>Input Alamat Pengirim dan Pembayaran</h3>

			<form action="<?php echo base_url() . 'Customer/proses_bayar'; ?>" enctype="multipart/form-data" method="post">
				<!-- <form action="<?php echo base_url() . 'dashboard/histori_pesanan'; ?>" method="post"> -->

				<!-- <input type="text" hidden name="id_customer" value="<?php echo $tb_customer['id_customer'] ?>"> -->
				<!-- <input type="text" hidden name="id_invoice" value="<?php echo $this->uri->segment(3); ?>"> -->

				<div class="form-group">
					<label>ID CUSTOMER</label>
					<input type="text" name="id_customer" placeholder="Id Customer" class="form-control" value="<?php echo $tb_customer['id_customer'] ?>" readonly>
				</div>

				<div class="form-group">
					<label>ID INVOICE</label>
					<input type="text" name="id_invoice" placeholder="Id Invoice" class="form-control" value="<?php echo $id_invoice ?>" readonly>
				</div>

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="nama lengkap anda" class="form-control" value="<?php echo $this->session->userdata('name') ?>">
				</div>


				<div class="form-group">
					<label>Alamat Lengkap Lengkap</label>
					<input type="text" name="alamat" placeholder="alamat lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat') ?>">
				</div>

				<div class="form-group">
					<label>No. Telpon</label>
					<input type="text" name="no_telp" placeholder="nomer telepon anda" class="form-control" value="<?php echo $this->session->userdata('no_telp') ?>">
				</div>

				<div class="form-group">
					<label>Tanggal Bayar</label>
					<input type="date" name="tgl_bayar" class="form-control">
				</div>

				<div class="form-group">
					<label>Pembayaran</label>
					<select class="form-control" name="metode">
						<option value="BCA - 5218432721">BCA - 5218432721</option>
						<option value="BNI - 5218432722">BNI - 5218432722</option>
						<option value="BRI - 5218432723">BRI - 5218432723</option>
						<option value="MANDIRI - 5218432724">MANDIRI - 5218432724</option>
					</select>
				</div>

				<div class="form-group">
					<label>Bukti Transaksi </label>
					<input type="file" class="form-control" id="bkt_transaksi" name="bkt_transaksi" placeholder="Bukti Transaksi">
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Konfirmasi</button>

				<!-- <a href="<?php echo base_url('welcome') ?>">
					<div class="btn btn-danger btn-sm mt-3"> Batal </div>
				</a> -->
			</form>

		</div>

		<div class="col-md-2"></div>
	</div>
</div>