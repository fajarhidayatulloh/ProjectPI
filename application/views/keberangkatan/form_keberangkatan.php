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

							<form action="<?php echo base_url('home/inputKeberangkatan'); ?>" method="post" class="form-horizontal">
								<?php foreach($r->result() as $c) {?>
									<input type="hidden" class="form-control" name="id_penangkapan" value="<?php echo $c->id_penangkapan; ?>">
									<?php  } ?>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="datepicker" name="tanggal" placeholder="Isikan Tanggal">
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
									<label class="col-sm-2 control-label">Jumlah BBM</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jml_bbm" placeholder="Isi Jumlah BBM Dalam Angka" required="true">
									</div>
								</div>
								<div class="hr-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jumlah Es</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jml_es" placeholder="Isi Jumlah Es Dalam Angka" required="true">
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
								<input type="hidden" class="form-control" name="sp" value="1" > 
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" type="submit">Simpan Data</button>
										<a class='btn btn-default' href="<?php echo base_url('penangkapan') ?>"> Batal</a>
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

<!--tabel data 

-->