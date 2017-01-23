<?php  

	class Penangkapan extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_penangkapan','m_keberangkatan','m_operasi_setting','m_operasi_hauling','m_hasil_tangkap','m_pendaratan'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				
				$this->data['lihat']['title2']		='List Data Penangkapan';
	            $this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
	            $this->data['lihat']['record']		= $this->m_penangkapan->ambilData();
	            $this->data['lihat']['status'] 		= $this->m_penangkapan->status();
                $this->data['lihat']['status2'] 	= $this->m_operasi_setting->status_operasi();
	            $this->template->load('template','penangkapan/lihat_data',$this->data['lihat']);
            }
		}
		function input(){
			$this->data['lihat']['title']		='Input Data Penangkapan';
			$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
			$this->template->load('template','penangkapan/form_penangkapan',$this->data['lihat']);
		}

		function status_penangkapan(){
			
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				if(isset($_POST['submit'])){
					$id 				=$this->input->post('id');
					$data=array(
						'id_penangkapan' 		=>$id,
						'status_penangkapan' 	=>1
						
						);
					
					$hasil=$this->m_penangkapan->updateData($id,$data);
						echo "<script>
		                            alert('Operasi Penangkapan Sudah Selesai')
		                        </script>";
		            $this->index();
		        }
		    }
		}

		function status_operasi(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				if(isset($_POST['submit'])){
					$id 				=$this->input->post('id');
					$data=array(
						'id_operasi_setting' 	=>$id,
						'status_operasi'	 	=>1
						);
					
					$hasil=$this->m_operasi_setting->updateData($id,$data);
						echo "<script>
		                            alert('Operasi Setting Sudah Selesai')
		                        </script>";
		            $this->index();
		        }
		    }
		}

		function laporan($id){
			$this->load->library('cfpdf');
			$id=  $this->uri->segment(3);
		    
        	$pdf=new FPDF('P','mm','A4');
        	$pdf->AddPage();
	        $pdf->SetFont('Arial','B','P');
	        $pdf->SetFontSize(14);
	        $pdf->SetFillColor(210,221,242);
	        $pdf->Text(70, 15, 'LAPORAN LOG PENANGKAPAN');
	        $pdf->text(10,20,'_____________________________________________________________________');
	        $pdf->SetFont('Arial','B','P');
	        $pdf->SetFontSize(10);
	        $pdf->text(10,27,'Nahkoda :');
	        $pdf->text(90,27,'Nomor Kapal :');
	        $pdf->text(135,27,'Status :');
	        $pdf->Cell(20, 20,'','',1);

	        $pdf->SetFillColor(139,69,19);
	        $pdf->Cell(189, 7, '', 1,1);
	        $pdf->text(90,35,'Keberangkatan');
	        $pdf->cell(189,40,'',1,1);
	        $pdf->text(30,45,'Tanggal Keberangkatan');
	        $pdf->text(90,45,':');
	        $pdf->text(30,52,'Jam Keberangkatan');
	        $pdf->text(90,52,':');
	        $pdf->text(30,59,'Jumlah BBM');
	        $pdf->text(90,59,':');
	        $pdf->text(100,59,'Liter');
	        $pdf->text(30,66,'Jumlah ES');
	        $pdf->text(90,66,':');
	        $pdf->text(100,66,'Kilogram');
	        $pdf->text(30,73,'Pelabuhan');
	        $pdf->text(90,73,':');
	        $pdf->cell(189,7,'',1,1);
	        $pdf->text(90,82,'Operasi');
	        $pdf->cell(189,70,'',1,1);
	        $pdf->text(30,92,'Tanggal Operasi Setting');
	        $pdf->text(90,92,':');
	        $pdf->text(30,99,'Tanggal Operasi Hauling');
	        $pdf->text(90,99,':');
	        $pdf->text(30,106,'Jam Operasi Setting');
	        $pdf->text(90,106,':');
	        $pdf->text(30,113,'Jam Operasi Hauling');
	        $pdf->text(90,113,':');
	        $pdf->text(30,120,'Jenis Alat Tangkap');
	        $pdf->text(90,120,':');
	        $pdf->text(30,127,'Posisi Setting');
	        $pdf->text(70,127,'Latitude');
	        $pdf->text(90,127,':');
	        $pdf->text(70,134,'Longitude');
	        $pdf->text(90,134,':');
	        $pdf->text(30,141,'Posisi Hauling');
	        $pdf->text(90,141,':');
	        $pdf->text(70,141,'Latitude');
	        $pdf->text(90,141,':');
	        $pdf->text(70,148,'Longitude');
	        $pdf->text(90,148,':');
	        $pdf->cell(189,7,'',1,1);
	        $pdf->text(90,159,'Pendaratan');
	        $pdf->cell(189,30,'',1,1);
	        $pdf->text(30,169,'Tanggal Pendaratan');
	        $pdf->text(90,169,':');
	        $pdf->text(30,177,'Jam Pendaratan');
	        $pdf->text(90,177,':');
	        $pdf->text(30,184,'Pelabuhan');
	        $pdf->text(90,184,':');
	        $pdf->cell(189,7,'',1,1);
	        $pdf->text(90,196,'Hasil Tangkap Ikan');
	        $pdf->cell(189,40,'',1,1);
	        $pdf->text(30,206,'Tanggal Bongkar');
	        $pdf->text(90,206,':');
	        $pdf->text(30,213,'Jam Bongkar');
	        $pdf->text(90,213,':');
	        $pdf->text(30,220,'Jenis Ikan');
	        $pdf->text(90,220,':');
	        $pdf->text(30,227,'Berat Ikan');
	        $pdf->text(90,227,':');
	        $pdf->text(105,227,'Kilogram');
	        $data=$this->m_keberangkatan->SelectAll($id);
	        foreach($data->result() as $r){
	        	$pdf->text(30,27,$r->nama_pengguna,1,0);
	        	$pdf->text(120,27,$r->no_kapal,1,0);
	        	if($r->status_penangkapan==1){
	        		$pdf->text(150,27,'Penangkapan Selesai',1,0);
	        	}
	        	$pdf->text(92,45,date('d F Y',strtotime($r->tgl)),1,1);
	        	$pdf->text(92,52,$r->jam,1,1);
	        	$pdf->text(92,59,$r->bbm,1,1);
	        	$pdf->text(92,66,$r->es,1,1);
	        	$pdf->text(92,73,$r->pelabuhan,1,1);
	        	$pdf->text(150,250,date('d F Y',strtotime($r->tgl)),1,1);
	        	$pdf->text(150,255,'Nahkoda',1,1);
	        	$pdf->text(150,275,$r->nama_pengguna,1,1);
	        }
	        $data=$this->m_operasi_setting->SelectAll($id);
	        foreach($data->result() as $r){
	        	$pdf->text(92,92,date('d F Y',strtotime($r->tgl)),1,0);
	        	$pdf->text(92,106,$r->jam,1,1);
	        	$pdf->text(92,120,$r->jenis_alat,1,1);
	        	$pdf->text(92,127,$r->lat,1,1);
	        	$pdf->text(92,134,$r->lng,1,1);
	        }
	        $data=$this->m_operasi_hauling->SelectAll($id);
	        foreach($data->result() as $r){
	        	$pdf->text(92,99,date('d F Y',strtotime($r->tgl)),1,0);
	        	$pdf->text(92,113,$r->jam,1,1);
	        	$pdf->text(92,141,$r->lat,1,1);
	        	$pdf->text(92,148,$r->lng,1,1);
	        }
	        $data=$this->m_pendaratan->SelectAll($id);
	        foreach($data->result() as $r){
	        	$pdf->text(92,169,date('d F Y',strtotime($r->tgl)),1,0);
	        	$pdf->text(92,177,$r->jam,1,1);
	        	$pdf->text(92,184,$r->pelabuhan,1,1);
	        }
	        $data=$this->m_hasil_tangkap->SelectAll($id);
	        foreach($data->result() as $r){
	        	$pdf->text(92,206,date('d F Y',strtotime($r->tgl)),1,0);
	        	//$pdf->text(92,206,$r->jam,1,1);
	        	$pdf->text(92,220,$r->jenis_ikan,1,1);
	        	$pdf->text(92,227,$r->berat_ikan,1,1);
	        }

	        $pdf->output("Laporan_log_penangkapan.pdf","I");
	        
		}
		
		function edit(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				if(isset($_POST['submit'])){
					$id 				=$this->input->post('id');
					$no_kapal 			=$this->input->post('no_kapal');
					$nama_kapal			=$this->input->post('nama_kapal');
					$data=array(
						'no_kapal'				=>$no_kapal,
						'nama_kapal'			=>$nama_kapal
						
						);
					
					$hasil=$this->m_penangkapan->updateData($id,$data);
						echo "<script>
		                            alert('Tersimpan')
		                        </script>";
		                  $this->index();
		        }else{
		        	$this->data['pengguna']=$this->m_login->data($this->user);
		        	$id=  $this->uri->segment(3);
		        	$this->data['title']='Edit Data Penangkapan';
		        	$this->data['record'] = $this->m_penangkapan->getOne($id);
	            	$this->template->load('template','penangkapan/form_edit',$this->data);
		        }
		    }
		}

		function hapus(){
			$id= $this->uri->segment(3);
	        $this->m_penangkapan->delete($id);
	        echo '<script>
	                alert("Data berhasil  dihapus")
	              </script>';
	        $this->index();
		}
	}
?>