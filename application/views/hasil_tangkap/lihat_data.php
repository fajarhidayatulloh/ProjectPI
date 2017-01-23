<!--tabel data -->
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
							<a class='btn btn-primary btn' href="<?php echo base_url('penangkapan') ?>">
							<span class='glyphicon glyphicon-pencil'></span> KEMBALI</a>
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>No Kapal</th>
										<th>Nama Kapal</th>
										<th>Jenis Ikan</th>
										<th>Berat Ikan</th>
										<th>Pelabuhan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($record->result() as $r): ?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo date('d F Y',strtotime($r->tgl)) ?></td>
										<td><?php echo $r->no_kapal ?></td>
										<td><?php echo $r->nama_kapal ?></td>
										<td><?php echo $r->jenis_ikan ?></td>
										<td><?php echo $r->berat_ikan ?> K/g</td>
										<td><?php echo $r->pelabuhan ?></td>
										<td><?php echo "<a class='btn btn-primary btn-sm' 
														 href='".base_url('hasil_tangkap/edit/'.$r->id_hasil_tangkap)."'>
														 <span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                           				 <a class='btn btn-danger btn-sm' 
                                           				 href='".base_url('hasil_tangkap/hapus/'.$r->id_hasil_tangkap)."'>
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