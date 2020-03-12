
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

  
<form class="form-horizontal" action="<?php echo site_url('HomeCtr/keuangan_update') ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $up_keuangan->id_keuangan?>" />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tambah <strong>Layanan</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                   
                </div>
                <div class="panel-body">

                   <div class="row">
                   <div class="col-md-6">
                   <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Debit</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="debit" value="<?= $up_keuangan->debit ?>" />
                            </div>
                
                        </div>
                    </div>

                   </div>
                   <div class="col-md-6">
                   <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Kredit</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="kredit" value="<?= $up_keuangan->kredit ?>" />
                            </div>
                
                        </div>
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