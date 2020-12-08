<div class="container-fluid">
	<h4>Invoice Pemesanan Produk</h4>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>Id Invoice</th>
				<th>Nama Pemesan</th>
				<th>Alamat</th>
				<th>Tanggal</th>
				<th>Batas Pembayaran</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>

			<?php foreach ($invoice as $inv) : ?>
				<tr>
					<td><?php echo $inv->id_invoice ?></td>
					<td><?php echo $inv->nama ?></td>
					<td><?php echo $inv->alamat ?></td>
					<td><?php echo $inv->tgl_pesan ?></td>
					<td><?php echo $inv->batas_bayar ?></td>
					<td><?php echo $inv->status_pembayaran ?></td>
					<td><?php echo anchor('admin/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>