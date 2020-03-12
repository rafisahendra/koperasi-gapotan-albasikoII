<?php $this->load->view("header") ?>



<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Data Pinjaman Dana</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="<?php echo site_url('HomeCtr/pinjaman_view') ?>"><span class="fa fa-refresh"></span></a>
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
				
					<div class="pull-right">
                  <a href="<?= site_url('HomeCtr/angsuran_detail_view') ?>" style='margin-bottom:10px' class="btn btn-warning">Bayar Angsuran Pinjaman</a>
                </div>
				<table class="table datatable">
					<thead>
						<tr >
							<th>No</th>
							<th>Nama Anggota</th>
							<th>Jumlah Pinjaman</th>
							<th>Jumlah Pinjaman + Bunga</th>
							<th width="250" class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pinjam as $no => $data):
								$bunga = ($data->bunga_pinjaman /100 ) * $data->jumlah_pinjaman;
								$bunga_pinjaman = $bunga + $data->jumlah_pinjaman;
							 ?>
						
						<tr>
							<td><?= $no+1 ?></td>	
							<td> <?php echo $data->nama_lengkap ?></td>
							<td>Rp. <?php echo $data->jumlah_pinjaman?></td>
							<td>Rp. <?php echo $bunga_pinjaman;?></td>
		
							<td  class="text-center">
								<p style="color:#29b2e1">Angsuran</p>
							</td>

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
<!-- SCRIPT -->

