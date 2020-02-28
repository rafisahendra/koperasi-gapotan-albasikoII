<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">


		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Transaksi</h3>
				<ul class="panel-controls">
					
					<li><a href="<?php echo site_url('HomeCtr/transaksi_view') ?>" ><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->


				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">No Transaksi</label>

						</div>
					</div>
                    <div class="col-md-3">: <?php echo $dt_transaksi->id_transaksi ?></div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Qty </label>

						</div>
					</div>
                    <div class="col-md-3">: <?php echo $dt_transaksi->qty ?></div>
				</div>

				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Nama Pembeli</label>

						</div>
					</div>
                    <div class="col-md-3">: <?php echo $dt_transaksi->nama_pembeli ?></div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Total </label>

						</div>
					</div>
                    <div class="col-md-3">: Rp. <?php echo $dt_transaksi->total ?></div>
				</div>


				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						<div class="form-group">
							<!-- <button class="btn btn-info">Cetak</button> -->
						</div>
					</div>


				</div>


			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Transaksi Pembelian</h3>
				<ul class="panel-controls">

			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
				<table class="table ">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Jumlah Beli</th>
							<th>Harga</th>
							<th>Total</th>
						

						</tr>
					</thead>
					<tbody>
						<?php
					 $totalSub = 0; 
					 $jumlahJb = 0;
					 foreach($dt_detail as $no => $d) :
						$totalSub = $totalSub += $d->subtotal ;
						$jumlahJb = $jumlahJb += $d->jumlah ;
					  ?>

						<tr>
							<td><?php echo $no+1 ?></td>
							<td><?php echo $d->nama_barang ?></td>
							<td><?php echo $d->jumlah ?></td>
							<td>Rp. <?php echo $d->harga ?></td>
							<td>Rp. <?php echo $d->subtotal ?></td>
							

						</tr>
						<?php endforeach ; ?>

						<tr>
							<td colspan="4">Total Pembelian</td>
							<td>Rp. <?= $totalSub ?></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<?php $this->load->view("footer") ?>
