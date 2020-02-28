
<?php $this->load->view('header') ?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Default</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                   
                </ul>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>

            <div class="panel-body">
                <!-- <a href="<?= site_url('HomeCtr/kategori_add') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a> -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Layanan</th>
                            <th>Jenis Layanan</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dt_kategori as $no => $data): ?>
                        <tr>
                        <td><?= $no+1 ?></td>
							<td> <?php echo $data->kode_layanan ?></td>
							<td> <?php echo $data->nama_kategori ?></td>
<!--                           
                          <td width="250">
								<a href="<?php echo site_url('HomeCtr/kategori_edd/'.$data->id_kategori) ?>"
									class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>

								<a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('HomeCtr/kategori_del/'.$data->id_kategori) ?>" class="btn btn-small text-danger"><i class="fa fa-trash-o"></i> Hapus</a>

								
							</td> -->

						</tr>
						<?php endforeach; ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->


    </div>
</div>


<?php $this->load->view('footer') ?>