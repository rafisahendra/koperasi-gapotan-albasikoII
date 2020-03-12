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
                    <div class="col-md-3">: Rp. <?php echo $dtpangsuran->jumlah_pinjaman ?></div>
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
							<label for="">Lama Peminjaman/ Bulan</label>

						</div>
					</div>
                    <div class="col-md-3">: <u><?php echo $dtpangsuran->lama_pinjaman ?> Bulan</u></div>
				</div>


				<div class="row" style="margin-top:50px">
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Status Angsuran</label>

						</div>
					</div>
					<?php if($angsuran_ke['angsuran_ke']== null){?> 
				 		<div class="col-md-3">: <b style="font-size:14px;"> Angsuran Selesai</b></div>
					<?php }else{ ?>
						<div class="col-md-3">: <b style="font-size:14px;"> Angsuran ke-<?php echo $angsuran_ke['angsuran_ke'] ?></b></div>
					<?php	} ?>
                  
                 
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Jumlah Besar angsuran yang harus dibayarkan </label>

						</div>
					</div>
					<?php if($angsuran_ke['angsuran_ke']== null){?>
						<div class="col-md-5"><span ><b style="font-size:20px;">: -</div></b></span>
					<?php }else{ ?>
						<div class="col-md-5"><span ><b style="font-size:20px;">: Rp.<?php echo $dtpangsuran->besar_angsuran ?>
                    </div></b></span>
					<?php	} ?>
                 

				</div>
				<div class="row" >
					<div class="col-md-2">
						<div class="form-group">
							<label for="">Tanggal jatuh tempo</label>

						</div>
					</div>
					<?php if($angsuran_ke['angsuran_ke']== null){?>
						<div class="col-md-3">: <b style="font-size:13px;"> - </b></div>
					<?php }else{ ?>
						<div class="col-md-3">: <b style="font-size:14px;"> <?php echo tgl_indo($angsuran_ke['batas_bayar']) ?></b></div>
					<?php	} ?>
                  
                 
					

				</div>
                <div class="row" style="margin-top:50px">
                <div class="col-md-12">
		<?php if($angsuran_ke['angsuran_ke']== null){?>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
			Bayar Sekarang
			</button>
			
		<?php }else{ ?>
			<a href="<?php echo base_url('HomeCtr/bayar_angsuran_add/').$dtpangsuran->id_peminjaman ?>" class="btn btn-danger">Bayar Sekarang</a> 
		<?php	} ?>
                  
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
							<th>Angsuran </th>
							<th>Batas Bayar</th>
							<th>Jumlah Bayar</th>
							<th>Status</th>
							
						

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
							<td>Angsuran Ke-<?php echo $d->angsuran_ke ?></td>
							<td><?php echo tgl_indo($d->batas_bayar) ?></td>
							<td>Rp. <?php echo $d->jumlah_bayar ?></td>
							<?php if($d->status == 0) {?>
							<td Style="color:#29b2e1">Belum Dibayar</td>
							<?php }else{ ?>
							<td Style="color:Red;text-decoration: line-through;">Sudah Dibayar</td>
							<?php } ?>
						</tr>
						<?php endforeach ; ?>

						<tr>
							<td colspan="3">Total Angsuran</td>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Angsuran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
   		 <label style="color:red" for="">Pembayaran Selesai Dilakukan</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
