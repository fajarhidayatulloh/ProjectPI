<title><?php echo $title; ?></title>

		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title; ?></h4>
						</div>
						<div class="panel-body">

							<form action="<?php echo base_url('operasi_hauling/edit'); ?>" method="post" class="form-horizontal">
								<?php foreach($record->result() as $c) :?>
									<input type="hidden" class="form-control" name="id" value="<?php echo $c->id_operasi_hauling; ?>">
							
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="datepicker" name="tanggal" value="<?php echo $c->tgl; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jam</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jam" value="<?php echo $c->jam; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Alat</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jenis_alat" value="<?php echo $c->jenis_alat; ?>" required="true">
									</div>
								</div>
								
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Latitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $c->lat; ?>" name="lat" disabled>
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Longitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $c->lng; ?>" name="lng" disabled>
									</div>
								</div>
								
								
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
										<a class='btn btn-default' href="<?php echo base_url('operasi_hauling') ?>"> Batal</a>
									</div>
								</div>
								<?php  endforeach ?>
							<form>
						</div>
					</div>
				</div>
			</div>
		</div>
	