
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

  
<form class="form-horizontal" action="<?php echo site_url('HomeCtr/withdraw_save') ?>" method="post" enctype="multipart/form-data">
  
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Penarikan <strong>Withdraw</strong></h3>
                    <ul class="panel-controls">
                    <li><a href="<?php echo site_url('HomeCtr/withdraw_view') ?>" ><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>Tambah Untuk Penyimpanan</p>
                </div>
                <div class="panel-body">

                   
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Anggota </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <select name="id_anggota" id="" class="form-control" required>
                                   <option value="">- Pilih Anggota -</option>
                               <?php foreach($anggota as $d) : ?>
                               <option value="<?= $d->id_anggota ?>"><?= $d->nama_lengkap?></option>

                               <?php endforeach ; ?>
                               </select>
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Jenis Simpanan </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <select name="id_kategori" id="" class="form-control" required>
                                   <option value="">- Pilih Jenis -</option>
                               <?php foreach($kategori as $d) : ?>
                               <option value="<?= $d->id_kategori ?>"><?= $d->nama_kategori ?></option>

                               <?php endforeach ; ?>
                               </select>
                            </div>
                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">jumlah Withdraw </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="jumlah_withdraw" required placeholder="IDR:" />
                            </div>
                
                        </div>
                    </div>


                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-danger ">Lakukan Withdraw</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view("footer") ?>