<!DOCTYPE html>
<html lang="en">

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

<body>
	<!-- START PAGE CONTAINER -->
	<div class="page-container">

		<!-- START PAGE SIDEBAR -->
		<div class="page-sidebar">
			<!-- START X-NAVIGATION -->
			<ul class="x-navigation">
				<li class="xn-logo">
					<a href="#" style="font-size:20px">Gapotan Albasiko</a>
					<a href="#" class="x-navigation-control"></a>
				</li>
				<li class="xn-profile">
					<a href="#" class="profile-mini">
						<img src="<?php echo base_url() ?>/asset/img/logo-small.png" alt="John Doe" />
					</a>
					<div class="profile">

						<div class="profile-data">
							<div class="profile-data-name"><?php echo $this->session->userdata('user')  ?></div>
							<div class="profile-data-title">Selamat Datang /<?php if($this->session->userdata('level')==2){echo "Pemilik";}else {echo "Admin"; }?></div>
						</div>

					</div>
				</li>

				<li class="<?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
					<!-- segmen diatas untuk class active -->
					<a href="<?= site_url() ?>/HomeCtr"><span class="fa fa-home"></span> <span
							class="xn-text">Home</span></a>
				</li>
				
				<li class="<?php echo $this->uri->segment(2) == 'anggota_add' ? 'active': '' ?>">
					<!-- segmen diatas untuk class active -->
					<a href="<?= site_url() ?>/HomeCtr/anggota_add"><span class="fa fa-user"></span> <span
							class="xn-text">Register Member</span></a>
				</li>


				<li class="<?php echo $this->uri->segment(2) == 'anggota_view' ? 'active': '' ?>">
					<!-- segmen diatas untuk class active -->
					<a href="<?= site_url() ?>/HomeCtr/anggota_view"><span class="fa fa-users"></span> <span
							class="xn-text">Data Anggota</span></a>
				</li>

				<li class="<?php echo $this->uri->segment(2) == 'kategori_view' ? 'active': '' ?>">
					<!-- segmen diatas untuk class active -->
					<a href="<?= site_url() ?>/HomeCtr/kategori_view"><span class="fa fa-list"></span> <span
							class="xn-text">Jenis Layanan</span></a>
				</li>

				<?php if($this->session->userdata('level') == '1') : ?>

				<li class="xn-openable">
					<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Taransaksi</span></a>
					<ul>
					
						<li><a href="<?= base_url('HomeCtr/simpanan_add') ?>"> <span class="fa fa-file-text-o"></span> Simpan</a></li>
						<li><a href="<?= base_url('HomeCtr/pinjaman_add') ?>"> <span class="fa fa-file-text-o"></span> Pinjam</a></li>
						<li><a href="<?= base_url('HomeCtr/Withdraw_add') ?>"> <span class="fa fa-file-text-o"></span> Withdraw</a></li>
						<li><a href="<?= base_url('HomeCtr/angsuran_add') ?>"> <span class="fa fa-file-text-o"></span> Angsuran</a></li>



					</ul>
				</li>

				<li class="xn-openable">
					<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Data</span></a>
					<ul>
					
						<li><a href="<?= base_url('HomeCtr/simpanan_view') ?>"> <span class="fa fa-file-text-o"></span>Data Simpanan</a></li>
						<li><a href="<?= base_url('HomeCtr/pinjaman_view') ?>"> <span class="fa fa-file-text-o"></span>Data Pinjaman</a></li>
						<li><a href="<?= base_url('HomeCtr/angsuran_view') ?>"> <span class="fa fa-file-text-o"></span>Data Angsuran</a></li>
						<li><a href="<?= base_url('HomeCtr/withdraw_view') ?>"> <span class="fa fa-file-text-o"></span>Data Withdraw</a></li>



					</ul>
				</li>

				<?php endif; ?>
				<?php if($this->session->userdata('level') == '2') : ?>
				<li class="xn-openable">
					<a href="#"><span class="fa fa-table"></span> <span class="xn-text">Tabel</span></a>
					<ul>
						<li class="<?php echo $this->uri->segment(2) == 'admin_view' ? 'active': '' ?>">
							<!-- segmen diatas untuk class active -->
							<a href="<?= site_url('HomeCtr/admin_view') ;?>"><span class="fa fa-tasks"></span> Admin</a>
						</li>

					</ul>
				</li>	
				<?php endif; ?>
				<li class="xn-openable">
					<a href="tables.html"><span class="fa fa-calendar"></span> <span class="xn-text">Laporan</span></a>
					<ul>
						<li class="<?php echo $this->uri->segment(2) == 'laporan_barang' ? 'active': '' ?>">
							<!-- segmen diatas untuk class active -->
							<a  href="<?php echo base_url('HomeCtr/laporan_barang') ?>" target="_Blank"><span class="fa fa-list"></span> Laporan Simpanan</a></li>
						<li class="<?php echo $this->uri->segment(2) == 'laporan_transaksi_view' ? 'active': '' ?>">
							<!-- segmen diatas untuk class active -->
							<a href="<?php echo base_url('HomeCtr/laporan_transaksi_view') ?>"><span class="fa fa-list"></span> Laporan Pinjaman</a></li>

					</ul>
				</li>


			</ul>
			<!-- END X-NAVIGATION -->
		</div>
		<!-- END PAGE SIDEBAR -->

		<!-- PAGE CONTENT -->
		<div class="page-content">

			<!-- START X-NAVIGATION VERTICAL -->
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
				<!-- TOGGLE NAVIGATION -->
				<li class="xn-icon-button">
					<a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
				</li>
				<!-- END TOGGLE NAVIGATION -->
				
				<!-- SIGN OUT -->
				<li class="pull-right" style="margin-right:15px;">
					<a href="<?php echo base_url('Auth/logout') ?>"> <span class=""><b>Logout</b></span></a>
				</li>
				<!-- END SIGN OUT -->


			</ul>
			<!-- END X-NAVIGATION VERTICAL -->

			<!-- START BREADCRUMB -->
			<ul class="breadcrumb">
				

				<li class=" active">
					
				
				<p><a  href="<?= site_url() ?>/HomeCtr">Home </a> > <?php echo  ucfirst($this->uri->segment(2))  ?> </p>

					

				</li>
				
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">
