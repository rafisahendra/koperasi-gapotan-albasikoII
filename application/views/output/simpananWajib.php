<?php $this->load->view("header") ?>


<div class="row">
	<div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> Data Simpanan Wajib</h3>
				<ul class="panel-controls">
                <li><a href="<?php echo site_url('HomeCtr/simpanan_view') ?>" ><span class="fa fa-times"></span></a></li>
					
				</ul>
			</div>

			<div class="panel-body">
			
				<table class="table datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Anggota</th>
							<th>Kategori Simpanan</th>
							<th>Jumlah Simpanan</th>
							<th width="300" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($simpan as $no => $data): ?>
						<tr>
							<td><?= $no+1 ?></td>
						
							<td> <?php echo $data->nama_lengkap ?></td>
							<td> <?php echo $data->nama_kategori?></td>
							<td> <?php echo $data->jumlah_simpanan?></td>
						
							<td  class="text-center">
                            <a href="<?php echo site_url('HomeCtr/anggota_detail/'.$data->id_penyimpanan) ?>"
									class="btn btn-small text-info"><i class="fa fa-list"></i> Detail</a>
								<a href="<?php echo site_url('HomeCtr/anggota_edd/'.$data->id_penyimpanan) ?>"
									class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>

								<a onclick="return confirm('Are you sure you want to delete this item?');"
									href="<?php echo site_url('HomeCtr/anggota_del/'.$data->id_penyimpanan) ?>"
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
