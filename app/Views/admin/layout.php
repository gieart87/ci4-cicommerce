<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/css/adminlte.min.css">
	<!-- Custom style -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/css/custom.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- header -->
		<?php echo $this->include('admin/shared/header'); ?>

		<!-- sidebar -->
		<?php echo $this->include('admin/shared/sidebar'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- content -->
			<?php echo $this->renderSection('content'); ?>
		</div>
		<!-- /.content-wrapper -->
		
		<!-- Footer -->
		<?php echo $this->include('admin/shared/footer'); ?>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?php echo base_url()?>/admin/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url()?>/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url()?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url()?>/admin/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url()?>/admin/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?php echo base_url()?>/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url()?>/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url()?>/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url()?>/admin/plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url()?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url()?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url()?>/admin/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url()?>/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url()?>/admin/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url()?>/admin/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url()?>/admin/js/demo.js"></script>
	<script>
		$(".delete").on("submit", function () {
			return confirm("Do you want to remove this?");
		});

		function showSimpleProductAttributes() {
			$('#productStatus').prop("required", true);
			$('#productPrice').prop("required", true);
			$('#productStock').prop("required", true);
			$('#productWeight').prop("required", true);
			$(".simple-attributes").show();
		}

		function hideSimpleProductAttributes() {
			$('#productStatus').prop("required", false);
			$('#productPrice').prop("required", false);
			$('#productStock').prop("required", false);
			$('#productWeight').prop("required", false);
			$(".simple-attributes").hide();
		}

		function hideConfigurableAttributes() {
			$(".configurable-attributes").hide();
		}

		function showConfigurableAttributes() {
			$(".configurable-attributes").show();
		}

		function showHideProductAttributes() {
			var productType = $(".product-type").val();
				
			if (productType == 'simple') {
				showSimpleProductAttributes();
				hideConfigurableAttributes();
			} else if (productType == 'configurable'){
				showConfigurableAttributes();
				hideSimpleProductAttributes();
			} else {
				hideSimpleProductAttributes();
				hideConfigurableAttributes();
			}
		}

		$(function() {
			showHideProductAttributes();
			$(".product-type").change(function() {
				showHideProductAttributes();
			});
		});
	</script>
</body>
</html>
