<head>
	<!-- META SECTION -->

	<title><?php echo SITE_NAME ."-". ucfirst($this->uri->segment(2)) ."-". ucfirst($this->uri->segment(3)) ?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="icon" href="<?php echo base_url() ?>/asset/favicon.ico" type="image/x-icon" />
	<!-- END META SECTION -->

	<!-- CSS INCLUDE -->
	<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>/asset/css/theme-default.css" />
	<!-- EOF CSS INCLUDE -->
</head>
<div class="row">
<div class="col-md-12">

    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-text">page not found</div>
        <div class="error-subtext">Unfortunately we're having trouble loading the page you are looking for. Please wait a moment and try again or use action below.</div>
        <div class="error-actions">                                
                                       
        </div>
     
    </div>

</div>
</div>

<?php $this->load->view('footer.php'); ?>