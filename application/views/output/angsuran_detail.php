<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">


	<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Data Angsuran</h3>
				<ul class="panel-controls">
					
					<li><a href="<?php echo site_url('HomeCtr/angsuran_view') ?>" ><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">
			


				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">No Transaksi</label>

						</div>
					</div>
                    <div class="col-md-3">: <?php echo $dtpangsuran->id_peminjaman ?></div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Jumalah Peminjaman  </label>

						</div>
					</div>
                    <div class="col-md-3">: Rp.<?php echo $dtpangsuran->jumlah_pinjaman ?></div>
				</div>

				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Nama Pembeli</label>

						</div>
					</div>
                    <div class="col-md-3">: <?php echo $dtpangsuran->nama_lengkap ?></div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Jumlah Angsuran per-Bulan </label>

						</div>
					</div>
                    <div class="col-md-3">: Rp. <?php echo $dtpangsuran->besar_angsuran ?></div>
				</div>


				<div class="row" style="margin-top:50px">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Status Angsuran</label>

						</div>
					</div>
                    <div class="col-md-3">: <b>Angsuran ke-1</b></div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Jumlah Besar angsuran yang harus dibayarkan </label>

						</div>
					</div>
                    <div class="col-md-5"><span ><b style="font-size:20px;">: Rp.<?php echo $dtpangsuran->besar_angsuran ?>
                    </div></b></span>

				</div>
                <div class="row">
                <div class="col-md-12">

                <button class="btn btn-danger">Bayar Sekarang</button>
                
                </div>
                </div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-6">
						<div class="form-group">
							
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
				<h3 class="panel-title">Detail Angsuran Untuk Dibayar</h3>
				<ul class="panel-controls">

			</div>
			<div class="panel-body">
				<!-- <a href="/kategori/tambah" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
				<table class="table ">
					<thead>
						<tr>
							<th>No</th>
							<th>Cicilan </th>
							<th>Batas Bayar</th>
							<th>Jumlah Bayar</th>
							
						

						</tr>
					</thead>
					<tbody>
						<?php
					 $totalSub = 0; 
					 $jumlahJb = 0;
					 foreach($dtangsuran as $no => $d) :
						$totalSub = $totalSub += $d->jumlah_bayar ;
						// $jumlahJb = $jumlahJb += $d->jumlah ;
					  ?>

						<tr>
							<td><?php echo $no+1 ?></td>
							<td>Angsuran Ke-<?php echo $d->cicilan_ke ?></td>
							<td><?php echo tgl_indo($d->batas_bayar) ?></td>
							<td>Rp. <?php echo $d->jumlah_bayar ?></td>
						
							

						</tr>
						<?php endforeach ; ?>

						<tr>
							<td colspan="3">Total Angsuran yang harus dibayarkan</td>
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
