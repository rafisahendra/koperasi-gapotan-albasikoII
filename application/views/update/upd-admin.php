<?php $this->load->view("header") ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>


<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo site_url('HomeCtr/admin_update') ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
                 <h3 class="panel-title"> Edit <strong>Admin</strong></h3>
              
					<ul class="panel-controls">
						<li><a href="<?php echo site_url('HomeCtr/admin_view') ?>" class=""><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
				
				</div>
			
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nama Lengkap</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nama"  value="<?php echo $up_admin->nama_lengkap?>" />
								<input type="hidden" class="form-control"  name="level"  value="<?php echo $up_admin->level?>" />
								<input type="hidden" class="form-control"  name="id"  value="<?php echo $up_admin->id_admin?>" />
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nohp</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nohp" 
                                value="<?php echo $up_admin->nohp?>"/>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Alamat</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="alamat" value="<?php echo $up_admin->alamat?>" />
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Email</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="email" class="form-control" required name="email" 
                                value="<?php echo $up_admin->email?>"/>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Password</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="password" 
                                placeholder="Masukan Password"/>
							</div>

						</div>
					</div>

				</div>
				<div class="panel-footer">
					<button class="btn btn-default">Clear Form</button>
					<button class="btn btn-info">Update</button>
				</div>
			</div>
		</form>

	</div>
</div>

<?php $this->load->view("footer") ?>
