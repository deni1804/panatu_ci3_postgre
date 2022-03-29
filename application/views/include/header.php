<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>pantau imani prima</title>
	<!-- canvasjs chart-->
	<script type="text/javascript" src="<?php echo base_url('assets/chart/js/canvasjs.min.js'); ?>"></script>

	<!-- bawaan -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/skins/tango/skin1.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/skins/tango/skin.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/skins/ie7/skin.css'); ?>" />
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/lib/jquery-ui-timepicker-addon.css" />
	<script type="text/javascript" href="<?php echo base_url(); ?>themes/lib/jquery-ui-timepicker-addon.js"> </script>-->
	<!--<script type="text/javascript" src="<?php echo base_url('themes/lib/js/jquery-1.7.1.min.js'); ?>"></script>-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('themes/lib/css/smoothness/jquery-ui-1.8.18.custom.css'); ?>">

	<!-- Custom fonts for this template-->

	<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">




	<!-- data table -->
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<script type="text/javascript">
		function sop(iditem, item) {
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url() . 'pantau/keterangan'; ?>',
				data: 'IdItem=' + iditem,
				success: function(data) {

					$('#dialog').html(data);
					$('#item').html(item);
					//var dialogRoot = $('#dialog');
					/*
					dialogRoot.dialog({
						bgiframe: true,
						resizable: true,
						draggable: true,
						modal: false,
						title: 'SOP ' + Item,
						overlay: {
							background: "BLUE",
							opacity: 0.7
						}
					})
					*/
				}
			});

		};
	</script>


</head>


<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#00677a">

			<!-- Sidebar - Brand -->
			<div class="sidebar-brand d-flex align-items-center justify-content-center bg-white">
				<div class=" sidebar-brand-icon ">
					<i> <img src="<?= base_url('assets/img/logo_imani.png') ?>" class="img-fluid" alt="Responsive image"> </i>
				</div>
			</div>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item ">
				<a class="nav-link" href="<?php echo site_url() . 'dasboard'; ?>">
					<i class="fas fa-fw fa-home"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Pantau
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-laptop"></i>
					<span>Monitoring</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Monitoring :</h6>
						<a class="collapse-item fas fa-laptop-code" href="<?php echo site_url() . 'pantau'; ?>">&ensp;Monitoring Report</a>
						<a class="collapse-item fas fa-history" href="<?php echo site_url() . 'history'; ?>">&ensp;History</a>

					</div>

				</div>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-wrench"></i>
					<span>Utilities</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Utilities:</h6>
						<a class="collapse-item fas  fa-th-list" href="<?php echo site_url() . 'history/item'; ?>">&ensp;List Item</a>
						<a class="collapse-item fas fa-list-alt" href="<?php echo site_url() . 'login/registration'; ?>">&ensp;Registration</a>
						<a class="collapse-item fas fa-exclamation" href="<?php echo site_url() . 'help'; ?>">&emsp;&nbsp;Help</a>
					</div>
				</div>
			</li>




			<!-- Sidebar Toggler (Sidebar) -->

		</ul>
		<!-- End of Sidebar -->
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 "><?php echo $this->session->userdata('nama'); ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('assets/img/userEmployee.png') ?> ">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->