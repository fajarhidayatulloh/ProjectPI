<title><?php echo $title; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-11">
			<div class="row">
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title; ?></h4>
						</div>
						<div class="panel-body">

							<form action="<?php echo base_url('home/edit') ?>" method="post" class="form-horizontal">
							<?php foreach($record->result() as $pengguna): ?>
							<input type="hidden" name="id" class="form-control" value="<?php echo $pengguna->id_pengguna; ?>">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Pengguna</label>
									<div class="col-sm-10">
										<input type="text" name="nama" class="form-control" value="<?php echo $pengguna->nama_pengguna; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">ID Pengguna</label>
									<div class="col-sm-10">
										<input type="text" name="userid" class="form-control" value="<?php echo $pengguna->user_id; ?>" >
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-10">
										<input type="text" name="alamat" class="form-control" value="<?php echo $pengguna->alamat; ?>" >
									</div>
								</div>
							<?php endforeach ?>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
										<a class='btn btn-default' href="<?php echo base_url() ?>"> Batal</a>
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