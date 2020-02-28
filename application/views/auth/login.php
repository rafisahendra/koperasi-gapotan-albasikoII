<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Koperasi-Albasiko</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('asset/css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="text-center ">
                    <h2 style="font-family: roboto;color:#fff; margin-bottom:40px;">Koperasi| Albasiko</h2>
                </div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <?php if ($this->session->flashdata('gagal')): ?>
            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <?php echo $this->session->flashdata('gagal'); ?>
                            </div>
                            <?php endif; ?>
                    <form action="<?php echo base_url('Auth') ?>" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="email" placeholder="Masukan Email"/>
                        </div>
                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="pass" placeholder="Masukan Password"/>
                        </div>
                        <?php echo form_error('pass', '<small class="text-danger pl-3 ">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6">
                          
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2020 Juli Eka Saputra
                    </div>
                    <div class="pull-right">
                        <a href="#">Sistem</a> |
                        <a href="#">Informasi</a> |
                        <a href="#">15'</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>

  <!-- START PLUGINS -->
  <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

