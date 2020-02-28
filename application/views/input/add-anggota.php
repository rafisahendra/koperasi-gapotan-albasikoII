<?php $this->load->view("header") ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>



<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo site_url('HomeCtr/anggota_save') ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
                 <h3 class="panel-title"> Register <strong>Anggota</strong></h3>
              
					<ul class="panel-controls">
						<li><a href="<?php echo site_url('HomeCtr/anggota_view') ?>" class=""><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<p>Tambah Anggota Untuk Menambahkan User Sebagai Anggota</p>
				</div>
				<div class="panel-body">

				<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">NIk</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nik" />
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nama Lengkap</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								
								<input type="text" class="form-control" required name="nama" />
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Tempat lahir</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								
								<input type="text" class="form-control" required name="tempat_lahir" />
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Tanggal Lahir</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								
								<input type="date" class="form-control" required name="tgl_lahir" />
							</div>

						</div>
					</div>


				

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Pekerjaan</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								
								<input type="text" class="form-control" required name="pekerjaan" />
							</div>

						</div>
					</div>
					

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Agama</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<select name="agama"  class="form-control" required>
								<option value="">--Silahkan Pilih-- </option>
								<option value="Islam"> Islam</option>
								<option value="Kristen"> Kristen</option>
								<option value="Hindu"> Hindu</option>
								<option value="budha"> budha</option>
								<option value="Khatolik"> Khatolik</option>
								</select>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Jenis Kelamin</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<select name="jenis_kelamin"  class="form-control" required>
								<option value="">--Silahkan Pilih-- </option>
								<option value="laki-laki"> Laki-laki</option>
								<option value="Perempuan"> Perempuan</option>
								</select>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nohp</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nohp" />
							</div>

						</div>
					</div>

					

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Email</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="email" class="form-control" required name="email" />
							</div>

						</div>
					</div>
			
				<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Alamat</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="alamat" />
							</div>

						</div>
					</div>
				<div class="panel-footer">
					<button class="btn btn-default">Clear Form</button>
					<button class="btn btn-info">Simpan</button>
				</div>
			</div>
		</form>

	</div>
</div>

<?php $this->load->view("footer") ?>
