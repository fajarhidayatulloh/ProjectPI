<title>Daftar</title>

					
					<form action="<?php echo base_url('signup/input') ?>" method="post">
					<div class="col-md-offset-1 col-md-10">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-md-2 control-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" name="nama" required="true" placeholder="Masukan Nama">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Username</label>
								<div class="col-sm-10">
									<input type="text" name="userid" required="true" placeholder="masukan user id">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="password" name="password" required="true" placeholder="Masukan Password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Alamat</label>
								<div class="col-sm-10">
									<input type="text" name="alamat" required="true" placeholder="Masukan Alamat">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="submit" value="Daftar">
								</div>
							</div>
						</div>
					</div>
					</form>
