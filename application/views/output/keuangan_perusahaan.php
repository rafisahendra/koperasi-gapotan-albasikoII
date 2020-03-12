
<?php $this->load->view('header') ?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Keuangan Perusahaan</h3>
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
                <a href="<?= site_url('HomeCtr/keuangan_add') ?>" style='margin-bottom:10px' class="btn btn-info">Tambah Data</a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($keuangan as $no => $data): ?>
                        <tr>
                        <td><?= $no+1 ?></td>
							<td>Rp.  <?php echo number_format($data->debit ,2)?></td>
							<td>Rp.  <?php echo number_format($data->kredit ,2)?></td>
                          
                          <td width="250">
								<a href="<?php echo site_url('HomeCtr/keuangan_edd/'.$data->id_keuangan) ?>"
									class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
		
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


<?php $this->load->view('footer') ?>