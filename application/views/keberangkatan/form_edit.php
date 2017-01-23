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

							<?php echo form_open('keberangkatan/edit','class=form-horizontal') ?> 
							<?php foreach($record->result() as $r): ?>
								<input type="hidden" class="form-control" name="id" value="<?php echo $r->id_keberangkatan; ?>">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tanggal" value="<?php echo $r->tgl; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jam</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jam" value="<?php echo $r->jam; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jumlah BBM</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jml_bbm" value="<?php echo $r->bbm; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jumlah Es</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jml_es" value="<?php echo $r->es; ?>">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Pelabuhan</label>
									<div class="col-sm-10">
										<select class="selectpicker" name="pelabuhan" disabled="">
												<option><?php echo $r->pelabuhan; ?></option>
											</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
										<a href="<?php echo base_url('keberangkatan'); ?>" class="btn btn-default" type="submit" >Kemabli Ke Menu</a>
									</div>
								</div>
							<?php endforeach ?>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>