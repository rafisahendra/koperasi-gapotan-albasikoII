<?php $this->load->view("header") ?>
<!-- START WIDGETS -->

<div class="row">
	<div class="col-md-3">

		<!-- START WIDGET MESSAGES -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
			<div class="widget-item-left">
				<span class="fa fa-list"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"></div>
				<div class="widget-title">Total Hutang</div>
				<div class="widget-subtitle">In your website</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET MESSAGES -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET MESSAGES -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
			<div class="widget-item-left">
				<span class="fa fa-file-text-o"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"></div>
				<div class="widget-title">Total Piutang</div>
				<div class="widget-subtitle">In your website</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET MESSAGES -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET REGISTRED -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
			<div class="widget-item-left">
				<span class="fa fa-user"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $count_admin ?></div>
				<div class="widget-title">Total Kredit</div>
				<div class="widget-subtitle">In your website</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>
	<div class="col-md-3">

		<!-- START WIDGET REGISTRED -->
		<div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
			<div class="widget-item-left">
				<span class="fa fa-user"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count"><?php echo $count_admin ?></div>
				<div class="widget-title">Total Member</div>
				<div class="widget-subtitle">In your website</div>
			</div>
			<div class="widget-controls">
				<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
					title="Remove Widget"><span class="fa fa-times"></span></a>
			</div>
		</div>
		<!-- END WIDGET REGISTRED -->

	</div>

</div>
<!-- END WIDGETS -->
<?php $this->load->view("footer") ?>
