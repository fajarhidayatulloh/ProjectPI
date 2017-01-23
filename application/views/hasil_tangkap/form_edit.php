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

							<form action="<?php echo base_url('hasil_tangkap/edit'); ?>" method="post" class="form-horizontal">
								
								<?php foreach($record->result() as $r){ ?>
									<input type="hidden" class="form-control" name="id" value="<?php echo $r->id_hasil_tangkap; ?>">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" id="datepicker" class="form-control" name="tanggal" value="<?php echo $r->tgl; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Ikan</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jenis_ikan" value="<?php echo $r->jenis_ikan ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Berat Ikan</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="berat_ikan" value="<?php echo $r->berat_ikan ?>">
									</div>
								</div>
								
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Pelabuhan</label>
									<div class="col-sm-10">
										<select class="selectpicker" name="pelabuhan" disabled>
												<option><?php echo $r->pelabuhan ?></option>
											</select>
									</div>
								</div>
							<?php } ?>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit" name="submit">Simpan Data</button>
										<a class='btn btn-default' href="<?php echo base_url('hasil_tangkap') ?>"> Batal</a>
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