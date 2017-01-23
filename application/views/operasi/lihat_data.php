<title><?php echo $title; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title;?></h4>
						</div>
						<div class="panel-body">
							<a class='btn btn-primary btn' href="<?php echo base_url('penangkapan') ?>">
							<span class='glyphicon glyphicon-pencil'></span> KEMBALI</a>
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl Operasi</th>
										<th>Jam Operasi</th>
										<th>No Kapal</th>
										<th>Nama Kapal</th>
										<th>Jenis Alat</th>
										<th>Lokasi</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($record->result() as $r): ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo date('d F Y',strtotime($r->tgl)); ?></td>
										<td><?php echo $r->jam ?></td>
										<td><?php echo $r->no_kapal ?></td>
										<td><?php echo $r->nama_kapal ?></td>
										<td><?php echo $r->jenis_alat ?></td>
										<td><?php echo $r->lat ?>, <?php echo $r->lng ?></td>
										<td><?php if($r->status_operasi==0){
												echo "Operasi Sedang dilakukan";
											}else if($r->status_operasi==1){
												echo "Operasi Selesai";
												} ?></td>
										<td><?php echo "<a class='btn btn-primary btn-sm' 
														 href='".base_url('operasi_setting/edit/'.$r->id_operasi_setting)."'>
														 <span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                           				 <a class='btn btn-danger btn-sm' 
                                           				 href='".base_url('operasi_setting/hapus/'.$r->id_operasi_setting)."'>
                                           				 <span class='glyphicon glyphicon-remove'></span> Hapus</a>"; ?>
                                           				 	
                                        </td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>