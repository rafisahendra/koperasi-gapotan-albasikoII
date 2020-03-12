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
							<td> <?php echo number_format($data->jswb)?></td>
						
							<td  class="text-center">
							<a href="<?php echo site_url('HomeCtr/simpanan_wajib_detail_view/'.$data->id_anggota.'/'.$data->id_kategori) ?>"
									class="btn btn-small text-warning"><i class="fa fa-list"></i> History Member Simpanan Wajib</a>
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
