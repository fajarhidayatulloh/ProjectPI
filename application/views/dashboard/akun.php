<title><?php echo $title; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-10">
				
				<a class='btn btn-primary btn-sm' name="submit" href="<?php echo base_url('home/edit/'.$pengguna->id_pengguna);?>"><span class='glyphicon glyphicon-pencil'></span> Ubah Data Pengguna</a>
			
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title; ?></h4>
						</div>
						<div class="panel-body">

							<form method="get" class="form-horizontal">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Pengguna</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $pengguna->nama_pengguna; ?>" disabled="">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">ID Pengguna</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $pengguna->user_id; ?>" disabled="">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $pengguna->alamat; ?>" disabled="">
									</div>
								</div>
							<form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>