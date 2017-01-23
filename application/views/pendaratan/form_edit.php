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

							<form action="<?php echo base_url('penangkapan/inputKedatangan'); ?>" method="post" class="form-horizontal">
								<?php foreach($record->result() as $c) {?>
									<input type="hidden" class="form-control" name="id" value="<?php echo $c->id_kedatangan; ?>">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $c->tgl; ?>" disabled="">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jam</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="<?php echo $c->jam; ?>" disabled="">
									</div>
								</div>
							<?php  } ?>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Pelabuhan</label>
									<div class="col-sm-10">
										<select class="selectpicker" name="pelabuhan">
												<option>Sunda Kelapa</option>
												<option>Pelabuhan Ratu</option>
												<option>Pangandaran</option>
											</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit">Ubah</button>
										<button class="btn btn-default" type="reset">Cancel</button>
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

