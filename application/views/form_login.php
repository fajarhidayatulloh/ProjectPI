<!doctype html>
<html lang="id" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Masuk Ke Log Book</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(<?php echo base_url()?>assets/img/banner-bg.jpg); background-repeat:no-repeat;background-position:left top">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Masuk Ke Log Book</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form action="<?php echo base_url();?>login/login_form" class="mt" method="POST">

									<label for="" class="text-uppercase text-sm">ID Pengguna</label>
									<?php echo form_error('user_id');?>
									<input type="text" class="form-control mb" placeholder="Masukan ID Pengguna" name="user_id" 
									required="true">

									<label for="" class="text-uppercase text-sm">Kata Sandi</label>
									<?php echo form_error('password');?>
									<input type="password" placeholder="Masukan Kata Sandi" class="form-control mb" name="password" 
									required="true">
									
									<div class="checkbox checkbox-circle checkbox-info">
										<input id="checkbox7" type="checkbox" checked>
										<label for="checkbox7">
											Ingat Saya
										</label>
									</div>

									<button class="btn btn-primary btn-block" type="submit">Masuk</button>

								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="#" class="text-light">Lupa Kata Sandi?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/Chart.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/fileinput.js"></script>
	<script src="<?php echo base_url()?>assets/js/chartData.js"></script>
	<script src="<?php echo base_url()?>assets/js/main.js"></script>

</body>

</html>