<?php $this->load->view("header") ?>



<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Data Simpanan </h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="<?php echo site_url('HomeCtr/simpanan_view') ?>"><span class="fa fa-refresh"></span></a>
					</li>
					
				</ul>
			</div>

			<?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>
			<div class="panel-body">
				<a href="<?= site_url('HomeCtr/simpanan_add') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah
					Data</a>

                  <div class="pull-right">
                  <a href="<?= site_url('HomeCtr/simpananWajib_wiew') ?>" style='margin-bottom:10px' class="btn btn-danger">Simpanan
					Wajib</a>

                    	<a href="<?= site_url('HomeCtr/simpananPokok_view') ?>" style='margin-bottom:10px' class="btn btn-warning">Simpanan
					Pokok</a>
                  </div>
				<table class="table datatable">
					<thead>
						<tr >
							<th>No</th>
							<th>Nama Anggota</th>
							<th>Jumlah Simpanan</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach($simpan as $no => $data): ?>
						<tr>
							<td><?= $no+1 ?></td>
						
							<td> <?php echo $data->nama_lengkap ?></td>
							<td>Rp. <?php echo number_format($data->debit_simwajib + $data->debit_simpokok )?></td>
						

						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->


	</div>
</div>
<?php $this->load->view("footer") ?>
