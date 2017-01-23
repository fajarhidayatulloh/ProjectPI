<title><?php echo $title; ?></title>
<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						<?php foreach($record3->result() as $r): ?>
						<?php if($r->status_penangkapan==0){ ?>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">Penangkapan Sedang Berlangsung</h4>
									</div>
									<div class="panel-body">
										<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>No Kapal</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											
											<tbody>
											<?php $no=1; foreach($record3->result() as $r): ?>
												<tr>
													
													<td><?php echo $r->no_kapal ?></td>
													<td><?php if($r->status_penangkapan==0){
														echo "<div class='bk-danger'>Penangkapan Sedang Berlangsung</div>";
														}else if($r->status_penangkapan==1){
															echo "<div class='bk-success'>Penangkapan Telah Selesai</div>";
															} ?></td>
													<td><?php if($r->status_penangkapan==0){

															echo "<a class='btn btn-primary btn-sm' 
																   href='".base_url('keberangkatan/direct_keberangkatan')."'>
																	 <span class='glyphicon glyphicon-pencil'></span> INPUT KEBERANGKATAN</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('operasi_setting/direct_operasi')."'>
																	 <span class='glyphicon glyphicon-pencil'></span> OPERASI SETTING</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('operasi_hauling/direct_operasi')."'>
																	 <span class='glyphicon glyphicon-pencil'></span> OPREASI HAULING</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('pendaratan/direct_pendaratan/')."'>
																	 <span class='glyphicon glyphicon-pencil'></span> INPUT PENDARATAN</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('hasil_tangkap/direct_hasiltangkap/')."'>
																	 <span class='glyphicon glyphicon-pencil'></span> INPUT HASIL TANGKAP</a> 
													"; 
													}else if($r->status_penangkapan==1){
														echo "<a class='btn btn-primary btn-sm' 
																	 href='".base_url('keberangkatan')."'> LIHAT DATA KEBERANGKATAN</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('operasi_setting')."'> LIHAT DATA OPERASI SETTING</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('operasi_hauling')."'> LIHAT DATA OPREASI HAULING</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('pendaratan')."'> LIHAT DATA KEDATANGAN</a>
																	 <a class='btn btn-primary btn-sm' 
																	 href='".base_url('hasil_tangkap')."'> LIHAT DATA HASIL TANGKAP</a> 
																	 <a class='btn btn-danger btn-sm' 
																	 href='".base_url('penangkapan/hapus/'.$r->id_penangkapan)."'>
																	 <span class='glyphicon glyphicon-pencil'></span> Hapus</a>";
													}
													?></td>
												</tr>
											<?php $no++; ?>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php endforeach ?>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<a href="<?php echo base_url('penangkapan/input'); ?>" style="color:#ffffff;"><div class="stat-panel-number h4 ">Klik Untuk Memulai Penangkapan</div></a>
												</div>
											</div>
											<div class="block-anchor panel-footer text-center">Mulai Penangkapan </div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<a href="<?php echo base_url('penangkapan'); ?>" style="color:#ffffff;"><div class="stat-panel-number h4 ">Klik Untuk Melihat Data Penangkapan</div></a>
												</div>
											</div>
											<div class="block-anchor panel-footer text-center">Lihat Data Penangkapan </div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
										<?php foreach($record->result() as $r):?><?php if($r->status_penangkapan==0){ ?>
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h4 ">Penangkapan Sedang Berlangsung</div>
												</div>
											</div>
										<?php }else if($r->status_penangkapan==1){ ?>
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h4 ">Penangkapan Selesai</div>
													terakhir : <?php echo date('d F Y',strtotime($r->created_at)) ?>
												</div>
											</div>
										<?php } ?>
									<?php endforeach ?>
											<div class="block-anchor panel-footer text-center">Status Penangkapan </div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
										<?php foreach($record2->result() as $r):?><?php if($r->status_operasi==0){ ?>
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h4 ">Operasi Sedang Dilakukan</div>
												</div>
											</div>
										<?php }else if($r->status_operasi==1){ ?>
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h4 ">Operasi Selesai</div>
													Operasi terakhir : <?php echo date('d F Y',strtotime($r->tgl)) ?>
												</div>
												
											</div>
										<?php } ?>
										<?php endforeach ?>
											<div class="block-anchor panel-footer text-center">Status Operasi </div>
										</div>
									</div>
				
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Data Penangkapan Ikan Perbulan</div>
									<div class="panel-body">
										<div class="chart">
											<canvas id="dashReport" height="310" width="600"></canvas>
										</div>
										<div id="legendDiv"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Data Jenis Ikan Yang Ditangkap</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">
												<ul class="chart-dot-list">
													<li class="a1">date 1</li>
													<li class="a2">data 2</li>
													<li class="a3">data 3</li>
												</ul>
											</div>
											<div class="col-md-8">
												<div class="chart chart-doughnut">
													<canvas id="chart-area3" width="1200" height="650" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						

					</div>