<?php $this->load->view("header") ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success" role="alert">
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>


<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo site_url('HomeCtr/anggota_update') ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
                 <h3 class="panel-title"> Edit <strong>Anggota</strong></h3>
              
					<ul class="panel-controls">
						<li><a href="<?php echo site_url('HomeCtr/anggota_view') ?>" class=""><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
				
			<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">NIk</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nik"  value="<?php echo $anggota->nik?>" />
							</div>

						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Nama Lengkap</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="nama"  value="<?php echo $anggota->nama_lengkap?>" />
								<input type="hidden" class="form-control"  name="level"  value="<?php echo $anggota->level?>" />
								<input type="hidden" class="form-control"  name="id"  value="<?php echo $anggota->id_anggota?>" />
							</div>

						</div>
					</div>
                    
                    <div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Tempat lahir</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="tempat_lahir"   value="<?php echo $anggota->tempat_lahir?>" />
							</div>

						</div>
					</div><div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Tanggal Lahir</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="date" class="form-control" required name="tgl_lahir" 
                                value="<?php echo $anggota->tgl_lahir?>" />
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Pekerjaan</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="pekerjaan" 
                                value="<?php echo $anggota->pekerjaan?>"  />
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
								<input type="text" class="form-control" required name="nohp" 
                                value="<?php echo $anggota->nohp?>"/>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Email</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="email" class="form-control" required name="email" 
                                value="<?php echo $anggota->email?>"/>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Alamat</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" required name="alamat" value="<?php echo $anggota->alamat?>" />
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
