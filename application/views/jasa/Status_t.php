<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h4>Status Tukang Saat Ini</h4>
			<img src="<?= base_url('assets/img/construction-worker.png'); ?> " width="150px">

			<form action="<?php echo base_url() . 'jasa/Tukang/update_status_t'; ?>" method="post">

				<div class="form-group">
					<label for="status">Status Saya Saat Ini</label>
					<select class="form-control" name="status" placeholder="status">
						<option value="">Pilih</option>
						<option value="Persiapan">Persiapan</option>
						<option value="Berangkat">Berangkat</option>
						<option value="Bekerja">Bekerja</option>
						<option value="Selesai">Selesai</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
			</form>

		</div>
	</div>

</div>