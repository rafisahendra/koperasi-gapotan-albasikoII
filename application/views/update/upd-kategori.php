
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

  
<form class="form-horizontal" action="<?php echo site_url('HomeCtr/kategori_update') ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $up_kategori->id_kategori?>" />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tambah <strong>Layanan</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>Tambah Layanan Untuk Menambahkan Jenis Layanan</p>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Kode Layanan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="kode" value="<?= $up_kategori->kode_layanan ?>" />
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Layanan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nama" value="<?= $up_kategori->nama_kategori ?>" />
                            </div>
                
                        </div>
                    </div>


                   

                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-primary ">update</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view("footer") ?>