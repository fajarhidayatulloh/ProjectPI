<!--tabel data -->
<title><?php echo $title2; ?></title>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $title2; ?></h4>
						</div>
						<div class="panel-body">
							<a class='btn btn-primary btn' href="<?php echo base_url() ?>">
							<span class='glyphicon glyphicon-pencil'></span> KEMBALI</a>
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No Kapal</th>
										<th>Nama Kapal</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								
								<tbody>
								<?php $no=1; foreach($record->result() as $r): ?>
									<tr>
										
										<td><?php echo $r->no_kapal ?></td>
										<td><?php echo $r->nama_kapal ?></td>
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
														 href='".base_url('penangkapan/laporan/'.$r->id_penangkapan)."'>
														  Lihat Laporan PDF</a>
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
		</div>
	</div>
</div>
