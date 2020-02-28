<?php $this->load->view('header');?>


<div style="padding:30px;" class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Laporan Transaksi</h3>

	</div>
	<div class="row">
		<div class="col-md-4">
			<form action="<?php echo base_url('HomeCtr/perhari') ?>" method="post" target="_blank">
				<div class="form-group">
					<label>Laporan Penjualan Per-Hari</label>
					<input class="form-control" type="date" name="hari" value="<?php echo date('Y-m-d'); ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-success">Print</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<form action="<?php echo base_url('HomeCtr/perbulan') ?>" target="_blank" method="post">
				<div class="form-group">
					<label>Laporan Penjualan Per-Bulan</label>
					<input class="form-control" type="month" name="bulan" value="<?php echo date('Y-m'); ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-success">Print</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<form action="<?php echo base_url('HomeCtr/pertahun') ?>" method="post" target="_blank">
				<div class="form-group">
					<label>Laporan Penjualan Per-Tahun</label>
					<input class="form-control" type="number" min="2013" max="2023" name="tahun"
						value="<?php echo date('Y'); ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-success">Print</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('footer');?>
