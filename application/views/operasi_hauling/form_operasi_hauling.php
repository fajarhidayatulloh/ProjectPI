
<title><?php echo $title; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title; ?></h4>
						</div>
						<div class="panel-body">

							<form action="<?php echo base_url('home/input_hauling'); ?>" method="post" class="form-horizontal">
								<?php foreach($r->result() as $c) {?>
									<input type="hidden" class="form-control" name="id_penangkapan" value="<?php echo $c->id_penangkapan; ?>">
								<?php  } ?>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tanggal" placeholder="Isikan Tanggal" id="datepicker">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jam</label>
									<div class="col-sm-10">
										<input type="time" class="form-control" name="jam" placeholder="Isikan Jam">
									</div>
								</div>
							
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Alat</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jenis_alat" placeholder="Isikan Jenis Alat Tangkap" required="true">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Cari Lokasi</label>
									<div class="col-sm-10">
										<a href="<?php echo base_url('operasi_hauling/maps') ?>" class="btn btn-primary">Cari Lokasi</a>
									</div>
								</div>
								<?php foreach($lokasi->result() as $r): ?>
								<?php if($r->status==0){ ?>
									<div class="hr-dashed"></div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Latitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="lat" required="true">
									</div>
									</div>
									<div class="hr-dashed"></div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Longitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="lng" required="true">
									</div>
									</div>
									<?php }else if($r->status==1){?>
								
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Latitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="lat" value="<?php echo $r->lat ?>"  required="true">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Longitude</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="lng" value="<?php echo $r->lng ?>" required="true">
									</div>
								</div>
								<?php }?>
								<?php endforeach ?>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit">Simpan Data</button>
										<a class='btn btn-default' href="<?php echo base_url('operasi_hauling') ?>"> KEMBALI</a>
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
