<?php $this->load->view("header") ?>
<!-- START WIDGETS -->

<div class="row">
	<div class="col-md-3">
		
		<div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo base_url('HomeCtr/angsuran_view') ?>';">
			<div class="widget-item-left">
				<span class="fa fa-file-text-o"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><h5><h5>Rp. <?php echo number_format($count_pinjam->pinjam - $count_angsuran2->dibayar,2) ?></h5></div>
				<div class="widget-title">Total Pinjaman</div>
				<div class="widget-subtitle">Saat Peminjaman telah dibayarkan maka total berkurang secara otomatis</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		

	</div>
	<div class="col-md-3">

		
		<div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo base_url('HomeCtr/simpanan_view') ?>';">
			<div class="widget-item-left">
				<span class="fa fa-file-text-o"></span>
			</div>
			<div class="widget-data">
				<div class="wnum-count"><h5>Rp. <?php echo number_format($count_simpanan->simpan ,2)?></h4></div>
				<div class="widget-title">Total Simpanan</div>
				<div class="widget-subtitle">Saat Terjadi Penyimpanan maka total betambah secara otomatis</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		

	</div>
	<div class="col-md-3">

		
		<div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo base_url('HomeCtr/angsuran_view') ?>';">
			<div class="widget-item-left">
				<span class="fa fa-usd"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $count_angsuran ?> <span style="font-size:24px;">Member</span></div>
				<div class="widget-title"> Angsuran</div>
				
				<div class="widget-subtitle">Pinjaman </div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>
	<div class="col-md-3">

		
		<div class="widget widget-default widget-item-icon" onclick="location.href='<?php echo base_url('HomeCtr/anggota_view') ?>';">
			<div class="widget-item-left">
				<span class="fa fa-user"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $count_member?></div>
				<div class="widget-title">Total Member</div>
				<div class="widget-subtitle">In your website</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>

</div>
<!-- END WIDGETS -->
<?php $this->load->view("footer") ?>
