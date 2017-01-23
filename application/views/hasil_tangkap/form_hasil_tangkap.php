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

							<form action="<?php echo base_url('hasil_tangkap/direct_hasiltangkap'); ?>" method="post" class="form-horizontal">
								<?php foreach($r->result() as $c) {?>
									<input type="hidden" class="form-control" name="id" value="<?php echo $c->id_penangkapan; ?>">
								<?php  } ?>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" id="datepicker" class="form-control" name="tanggal" placeholder="Isikan Tangal">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Ikan</label>
									<div class="col-sm-10">
										<div>
											<input class="form-control" name="jenis_ikan" type="text" placeholder="Input Jenis Ikan"><br>
										</div>
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Berat Ikan</label>
									<div class="col-sm-10">
										<div>
											<input class="form-control" name="berat_ikan" type="text" placeholder="Input Berat Ikan"><br>
										</div>
									</div>
								</div>
								
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
										<button class="btn btn-primary" type="submit" name="submit">Simpan Data</button>
										<?php foreach($r->result() as $c): ?>
											<?php if($c->status_penangkapan==0){ ?>
												<a class='btn btn-default' href="<?php echo base_url('hasil_tangkap') ?>"> Batal</a>
											<?php }else if($c->status_penangkapan==1){?>	
												<a class='btn btn-default' href="<?php echo base_url('home') ?>"> Selesai</a>
											<?php } ?>
										<?php endforeach ?>
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
