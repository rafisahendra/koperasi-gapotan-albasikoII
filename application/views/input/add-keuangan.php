
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

  
<form class="form-horizontal" action="<?php echo site_url('HomeCtr/keuangan_save') ?>" method="post" enctype="multipart/form-data">
 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tambah Data<strong> Keuangan Peusahaan</strong></h3>
                    <ul class="panel-controls">
                    <li><a href="<?php echo site_url('HomeCtr/keuangan_view') ?>" ><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
        
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Jumlah Debit </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="debit" required />
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Jumlah Kredit </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="kredit" required />
                            </div>
                
                        </div>
                    </div>


                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-primary ">Simpan</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view("footer") ?>