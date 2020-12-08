<div class="container-fluid">
	<h4>Detail Pesanan <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div>
	</h4>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr align="center">
				<th>ID PEKERJA</th>
				<th>NAMA PEKERJA</th>
				<th>JUMLAH PESANAN</th>
				<th>HARGA SATUAN</th>
				<th>SUB-TOTAL</th>
			</tr>

			<?php
			$total = 0;
			foreach ($pesanan as $psn) :
				$subtotal = $psn->jumlah * $psn->harga_tkg;
				$total += $subtotal;
			?>

				<tr align="center">
					<td><?php echo $psn->id_tkg ?></td>
					<td><?php echo $psn->nama_tkg ?></td>
					<td><?php echo $psn->jumlah ?></td>
					<td><?php echo number_format($psn->harga_tkg, 0, ',', '.') ?></td>
					<td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
				</tr>

			<?php endforeach ?>

			<tr>
				<td colspan="4" align="right"><strong>Grand Total</strong></td>
				<td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
			</tr>

		</table>
	</div>

	<a href="<?php echo base_url('admin/invoice/index') ?>">
		<div class="btn btn-danger btn-sm"> Kembali </div>
	</a>

	<a href="<?php echo base_url('admin/invoice/cek_bukti') ?>">
		<div class="btn btn-primary btn-sm"> Cek Bukti </div>
	</a>

	<button class="btn btn-success btn-sm"><img src="<?= base_url('assets/img/telecommunications.png'); ?> " width="20px">
		Panggil Pekerja</button>
</div>