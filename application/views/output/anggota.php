<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Data Member</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="<?php echo site_url('HomeCtr/anggota_view') ?>"><span class="fa fa-refresh"></span></a>
					</li>

				</ul>
			</div>

			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
						class="sr-only">Close</span></button>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php endif; ?>
			<div class="panel-body">
				<!-- <a href="<?= site_url('HomeCtr/anggota_add') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah
					Data</a> -->
				<table class="table datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Tempat /Tanggal lahir</th>
							<th>Pekerjaan</th>
							<th>No.Telp</th>
							<th width="300" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($anggota as $no => $data): ?>
						<tr>
							<td><?= $no+1 ?></td>

							<td> <?php echo $data->nik ?></td>
							<td> <?php echo $data->nama_lengkap ?></td>
							<td> <?php echo $data->tempat_lahir.' , '.tgl_indo($data->tgl_lahir) ?></td>
							<td> <?php echo $data->pekerjaan ?></td>
							<td> <?php echo $data->nohp ?></td>
							<td class="text-center">

								<button type="button" class="btn btn-small text-info" data-toggle="modal"
									data-target="#staticBackdrop<?= $data->id_anggota ?>"><i class="fa fa-list"></i>Data Lengkap </button>

								<a href="<?php echo site_url('HomeCtr/anggota_edd/'.$data->id_anggota) ?>"
									class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>

								<a onclick="return confirm('Are you sure you want to delete this item?');"
									href="<?php echo site_url('HomeCtr/anggota_del/'.$data->id_anggota) ?>"
									class="btn btn-small text-danger"><i class="fa fa-trash-o"></i> Hapus</a>


							</td>

							<!-- Modal -->
							<div class="modal fade" id="staticBackdrop<?= $data->id_anggota ?>" data-backdrop="static"
								tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Data Member Detail</h5>
										</div>
										<div class="modal-body">
											<div class="row" style="margin-top:15px">
											<div class="form-group">
												<div class="col-md-2">Nik</div>
												<div class="col-md-4">: <?php echo $data->nik ?></div>
												<div class="col-md-2">Nama Lengkap</div>
												<div class="col-md-4">: <?php echo $data->nama_lengkap ?></div>
											</div>
											</div>
											<div class="row" style="margin-top:15px">
											<div class="form-group">
												<div class="col-md-2">Tempat/ Tanggal lahir</div>
												<div class="col-md-4">: <?php echo $data->tempat_lahir. ','.tgl_indo($data->tgl_lahir)?></div>
												<div class="col-md-2">NoHp</div>
												<div class="col-md-4">: <?php echo $data->nohp ?></div>
											</div>
											</div>
											<div class="row" style="margin-top:15px">
											<div class="form-group">
												<div class="col-md-2">Pekerjaan</div>
												<div class="col-md-4">: <?php echo $data->pekerjaan ?></div>
												<div class="col-md-2">Email</div>
												<div class="col-md-4">: <?php echo $data->email ?></div>
											</div>
											</div>
											<div class="row" style="margin-top:15px">
											<div class="form-group">
												<div class="col-md-2">Agama</div>
												<div class="col-md-4">: <?php echo $data->agama ?></div>
												<div class="col-md-2">Jenis Kelamin</div>
												<div class="col-md-4">: <?php echo $data->jenis_kelamin ?></div>
											</div>
											</div>
												<div class="row" style="margin-top:15px">
											<div class="form-group">
												<div class="col-md-2">Tanggal Menjadi anggota</div>
												<div class="col-md-4">: <?php echo $data->tgl_lahir ?></div>
												<div class="col-md-2">Alamat</div>
												<div class="col-md-4">: <?php echo $data->alamat ?></div>
											</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary"
												data-dismiss="modal">Close</button>

										</div>
									</div>
								</div>
							</div>


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
