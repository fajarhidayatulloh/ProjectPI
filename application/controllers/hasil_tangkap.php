<?php  

	class Hasil_tangkap extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_hasil_tangkap','m_penangkapan'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->data['lihat']['title']		='Laporan Data Hasil Tangkap';
	            $this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
	            $this->data['lihat']['record'] 			= $this->m_hasil_tangkap->ambilData();
	            $this->template->load('template','hasil_tangkap/lihat_data',$this->data['lihat']);
            }
		}

		function direct_hasiltangkap(){
			if(isset($_POST['submit'])){
				$this->form_validation->set_rules('jenis_ikan','Jenis Ikan','trim|required');
				$this->form_validation->set_rules('berat_ikan','Berat Ikan','trim|required');
				$this->form_validation->set_rules('pelabuhan','Pelabuhan','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					$id 				=$this->input->post('id');
					$jenis_ikan			=$this->input->post('jenis_ikan');
					$berat_ikan			=$this->input->post('berat_ikan');
					$pelabuhan 			=$this->input->post('pelabuhan');
					$tgl				=$this->input->post('tanggal');
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'id_penangkapan'		=>$id,
						'jenis_ikan'			=>$jenis_ikan,
						'berat_ikan'			=>$berat_ikan,
						'pelabuhan'				=>$pelabuhan,
						'tgl'					=>$tgl
						
						);
					$id 				=$this->input->post('id');
					$hasil=$this->m_hasil_tangkap->input($data);
					echo "<script>
	                            alert('Data Hasil Tangkap Tersimpan. Klik Selesai Jika Input Hasil Tangkap Selesai')
	                        </script>";
	                $this->data['lihat']['title']		='Input Data Hasil Tangkap';
					$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
					$this->data['lihat']['r'] 			= $this->m_penangkapan->Select();
					$this->template->load('template','hasil_tangkap/form_hasil_tangkap',$this->data['lihat']);
				}
			}else{
				$this->data['lihat']['title']		='Input Data Hasil Tangkap';
				$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
				$this->data['lihat']['r'] 			= $this->m_penangkapan->Select();
				$this->template->load('template','hasil_tangkap/form_hasil_tangkap',$this->data['lihat']);
			}
		}

		function edit(){
			if(isset($_POST['submit'])){
				$id 				=$this->input->post('id');
				$tgl				=$this->input->post('tgl');
				$jenis_ikan			=$this->input->post('jenis_ikan');
				$berat_ikan			=$this->input->post('berat_ikan');;
				$data=array(
					'tgl'					=>$tgl,
					'jenis_ikan'			=>$jenis_ikan,
					'berat_ikan'			=>$berat_ikan				
					);
				
				$hasil=$this->m_hasil_tangkap->updateData($id,$data);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
	        }else{
	        	$this->data['pengguna']=$this->m_login->data($this->user);
	        	$id=  $this->uri->segment(3);
	        	$this->data['title']	='Edit Data Hasil Tangkap';
				$this->data['r'] 		= $this->m_penangkapan->getOne($id);
	        	$this->data['record'] 	= $this->m_hasil_tangkap->getOne($id);
            	$this->template->load('template','hasil_tangkap/form_edit',$this->data);
	        }
		}

		function hapus(){
			$id= $this->uri->segment(3);
	        $this->m_hasil_tangkap->delete($id);
	        echo '<script>
	                alert("Data berhasil  dihapus")
	              </script>';
	        $this->index();
		}
	}
?>