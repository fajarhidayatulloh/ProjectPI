<title><?php echo $title2; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title2;?></h4>
						</div>
						<div class="panel-body">
						<a class='btn btn-primary btn' href="<?php echo base_url('penangkapan') ?>">
							<span class='glyphicon glyphicon-pencil'></span> KEMBALI</a>
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl Berangkat</th>
										<th>Jam Berangkat</th>
										<th>No Kapal</th>
										<th>Nama Kapal</th>
										<th>Jumlah BBM</th>
										<th>Jumlah Es</th>
										<th>Nahkoda</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($record->result() as $r): ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo date('d F Y',strtotime($r->tgl)); ?></td>
										<td><?php echo $r->jam ?></td>
										<td><?php echo $r->no_kapal; ?></td>
										<td><?php echo $r->nama_kapal; ?></td>
										<td><?php echo $r->bbm; ?> Liter</td>
										<td><?php echo $r->es; ?>  Kg</td>
										<td><?php echo $r->nama_pengguna; ?></td>
										<td><?php echo "<a class='btn btn-primary btn-sm' 
														 href='".base_url('keberangkatan/edit/'.$r->id_keberangkatan)."'>
														 <span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                           				 <a class='btn btn-danger btn-sm' 
                                           				 href='".base_url('keberangkatan/hapus/'.$r->id_keberangkatan)."'>
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