<?php $this->load->view("header") ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>



<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo site_url('HomeCtr/admin_save') ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
                 <h3 class="panel-title"> Tambah <strong>Admin</strong></h3>
              
					<ul class="panel-controls">
						<li><a href="<?php echo site_url('HomeCtr/admin_view') ?>" class=""><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<p>Tambah Admin Untuk Menambahkan User Sebagai Admin</p>
				</div>
				<div class="panel-body">

					
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nama Lengkap</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="hidden" class="form-control" required name="level" value="1" />
								<input type="text" class="form-control" required name="nama" />
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
						<label class="col-md-2 col-xs-12 control-label">Alamat</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="alamat" />
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
						<label class="col-md-2 col-xs-12 control-label">Password</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="password" />
							</div>

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
