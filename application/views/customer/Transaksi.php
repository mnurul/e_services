<div class="container-fluid">
		<!-- <h4>Detail Pesanan <div class="btn btn-success btn-sm">No. Invoice : <?php echo $invoice->id_invoice ?></div></h4> -->

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr align="center">
				<th>ID INVOICE</th>
				<th>TANGGAL PESAN</th>
				<th>BATAS BAYAR</th>
				<th>STATUS PEMBAYARAN</th>
				<th>Aksi</th>

			</tr>

			<?php
			$total = 0;
			if($invoice) {	//kodingan ini utk mengakali pesanan yg kosong sehingga link transaksi tidak error
			foreach ($invoice as $inv) :
			?>

				<tr align="center">
					<td><?php echo $inv->id_invoice ?></td>
					<td><?php echo $inv->tgl_pesan ?></td>
					<td><?php echo $inv->batas_bayar ?></td>
					<td><?php echo $inv->status_pembayaran ?></td>
					<td><?php echo anchor('Customer/detail/' . $inv->id_invoice, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>

			<?php endforeach;
		} 
		?>
		</table>
	</div>

	<a href="<?php echo base_url('welcome') ?>">
		<div class="btn btn-primary btn-sm"> Kembali </div>
	</a>
</div>
