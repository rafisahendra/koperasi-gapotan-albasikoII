<?php $this->load->view("header") ?>
<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Entry Data Anggota</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
					<li><a href="<?php echo site_url('HomeCtr/anggota_view') ?>"><span class="fa fa-refresh"></span></a>
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
							<th>Email</th>
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
							<td> <?php echo $data->email ?></td>
							<td> <?php echo $data->nohp ?></td>
							<td class="text-center">
                            <a href="<?php echo site_url('HomeCtr/anggota_detail/'.$data->id_anggota) ?>"
									class="btn btn-small text-info"><i class="fa fa-list"></i> Detail</a>
								<a href="<?php echo site_url('HomeCtr/anggota_edd/'.$data->id_anggota) ?>"
									class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>

								<a onclick="return confirm('Are you sure you want to delete this item?');"
									href="<?php echo site_url('HomeCtr/anggota_del/'.$data->id_anggota) ?>"
									class="btn btn-small text-danger"><i class="fa fa-trash-o"></i> Hapus</a>


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
