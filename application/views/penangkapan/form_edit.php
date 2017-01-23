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
							<?php echo form_open('penangkapan/edit','class=form-horizontal'); ?>
							<?php foreach($record->result() as $r): ?>
							 <input type="hidden" name="id" value="<?php echo $r->id_penangkapan; ?>">
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nomor Kapal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="no_kapal" value="<?php echo $r->no_kapal; ?>" required>
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Kapal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_kapal" value="<?php echo $r->nama_kapal; ?>" required>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit" name="submit">Simpan Data</button>
										<a href="<?php echo base_url('penangkapan') ?>" class="btn btn-default" >Kemabli Ke Menu</a>
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