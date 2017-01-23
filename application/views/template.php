<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	

	<!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.timepicker.css">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/timedropper.css">
	<script src="<?php echo base_url() ?>assets/js/timedropper.js"></script>
	<script>$( "#alarm" ).timeDropper();</script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        width: 100%;
      }
    </style>
  
	
</head>

<body>
	<div class="brand clearfix">
		<a href="<?php echo base_url();?>" class="logo">LogBook Perikanan</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#">Penganturan</a>
				<ul>
					<li><a href="<?php echo base_url('home/akun');?>">Akun Saya</a></li>
					<li><a href="<?php echo base_url('login/logout') ?>">Keluar</a></li>
				</ul>
			</li>
			<li><a href="#"><?php echo $pengguna->nama_pengguna ; ?></a></li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Menu Utama</li>
				<li class="open"><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><a href="<?php echo base_url('penangkapan'); ?>"><i class="fa fa-edit"></i> Laporan Data Penangkapan</a></li>
				<li><a href="<?php echo base_url('keberangkatan'); ?>"><i class="fa fa-edit"></i> Laporan Data Keberangkatan</a></li>
				<li><a href="#"><i class="fa fa-edit"></i> Laporan Data Operasi</a>
					<ul>
						<li><a href="<?php echo base_url('operasi_setting'); ?>">Operasi Setting</a></li>
						<li><a href="<?php echo base_url('operasi_hauling'); ?>">Operasi Hauling</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('pendaratan'); ?>"><i class="fa fa-edit"></i> Laporan Data Pendaratan</a></li>
				<li><a href="<?php echo base_url('hasil_tangkap'); ?>"><i class="fa fa-edit"></i> Laporan Data Hasil Tangkap</a></li>

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Pengaturan</a></li>
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="<?php echo base_url('home/akun');?>">Akun Saya</a></li>
							<li><a href="#">Ubah Pengguna</a></li>
							<li><a href="<?php echo base_url('login/logout') ?>">Keluar</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<?php echo $contents; ?>
				</div>
				<div class="row">
					<div class="clearfix pt pb">
						<div class="col-md-12">
							<em>Copyright &copy; 2016 Aplikasi LogBook Penangkapan Ikan</em>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/fileinput.js"></script>
	<script src="<?php echo base_url();?>assets/js/chartData.js"></script>
	<script src="<?php echo base_url();?>assets/js/main.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>

    <script>
		$(function() {
		    $( "#datepicker" ).datepicker({
		    	dateFormat: 'yy-mm-dd'
		    })
		});
    </script>
   
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>