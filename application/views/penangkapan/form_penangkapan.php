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

							<form action="<?php echo base_url('home/input_Penangkapan');?>" method="post" class="form-horizontal">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nomor Kapal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="no_kapal" placeholder="Isi Nomor Kapal" required="true">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Kapal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_kapal" placeholder="Isi Nama Kapal" required="true">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit">Simpan Data</button>
										<button class="btn btn-default" type="reset">Batal</button>
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

