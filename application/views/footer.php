  <!-- START DASHBOARD CHART -->
					<div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
					<div class="block-full-width">
                                                                       
                    </div>                    
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

   
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo base_url() ?>/asset/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url() ?>/asset/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url() ?>/asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/datatables/jquery.dataTables.min.js"></script>                   
        <script type='text/javascript' src='<?php echo base_url() ?>/asset/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
      
        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url() ?>/asset/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->       
    <script type="text/javascript">

    function pilih_barang(){
        var id_brand = $('#pilih-brand option:selected').val();

        $.ajax({
            url: "<?php echo base_url('HomeCtr/pilih_barang/'); ?>",
            type: "POST",
            data: { id_brand: id_brand },
            success: function(data){
                $('#pilih-barang').html(data);
            }
        });
    }

    function tampil_harga(){
        var harga = $('#pilih-barang option:selected').attr('harga');
        
        $('#harga').val(harga);
    }

    function tampil_total(){
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        var total = harga * jumlah;
        
        $('#total').val(total);
    }

    </script>  
    
    </body>
</html>






