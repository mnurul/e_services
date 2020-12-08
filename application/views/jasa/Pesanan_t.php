<div class="container-fluid">
	<h4>Surat Masuk</h4>
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No. AWB</th>
					<th>Consignee</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tampil as $value) { ?>
					<tr>
						<td><?php echo $value->no_awb; ?></td>
						<td><?php echo $value->consignee; ?></td>
						<td><a href="<?php echo base_url('jasa/Tukang/update/' . $value->id) ?>">
								<div class="btn btn-primary btn-sm"> Update </div>
							</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- <a href="<?php echo base_url('') ?>">
			<div class="btn btn-danger btn-sm"> Tolak </div>
		</a>

		<a href="<?php echo base_url('jasa/Tukang/status_t') ?>">
			<div class="btn btn-primary btn-sm"> Ambil </div>
		</a> -->
	</div>

</div>