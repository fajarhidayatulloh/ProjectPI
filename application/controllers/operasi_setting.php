<?php  

	class Operasi_setting extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_operasi_setting','m_penangkapan','m_lokasi'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->data['title']		='Laporan Data Operasi Setting';
	            $this->data['pengguna'] 	= $this->m_login->data($this->user);
	            $this->data['record'] 	= $this->m_operasi_setting->ambilData();
	            $this->template->load('template','operasi/lihat_data',$this->data);
            }
		}

		function direct_operasi(){
			$this->data['lihat']['title']		='Input Data Operasi Setting';
			$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
			$this->data['lihat']['r'] 			= $this->m_penangkapan->Select();
			$this->data['lihat']['lokasi']		= $this->m_lokasi->selectAll();
			$this->template->load('template','operasi/form_operasi_setting',$this->data['lihat']);
		}

		function maps(){
			if(isset($_POST['submit'])){	
				$lat 			=$this->input->post('lat');
				$lng			=$this->input->post('lng');
				$data=array(
						'lat'			=>$lat,
						'lng'			=>$lng,
						'status'		=>1
							
						);
				$hasil=$this->m_lokasi->input($data);
				echo "<script>
		                    alert('Tersimpan')
		                </script>";
		        $this->data['lihat']['title']		='Cari Lokasi';
				$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
	           	$this->load->view('operasi/map',$this->data['lihat']);
	        }else{
	        	$this->data['lihat']['title']		='Cari Lokasi';
				$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
		        $this->load->view('operasi/map',$this->data['lihat']);
	        }
		}

		function edit(){
			if(isset($_POST['submit'])){
				$id 				=$this->input->post('id');
				$jenis_alat 		=$this->input->post('jenis_alat');
				$lat				=$this->input->post('lat');
				$lng 				=$this->input->post('lng');
				$data=array(
					'jenis_alat'			=>$jenis_alat,
					'lat'					=>$lat,
					'lng'					=>$lng
					);
				
				$hasil=$this->m_operasi_setting->updateData($id,$data);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
	        }else{
	        	$this->data['pengguna']=$this->m_login->data($this->user);
	        	$id=  $this->uri->segment(3);
	        	$this->data['title']='Edit Data Operasi Setting';
	        	$this->data['record'] = $this->m_operasi_setting->getOne($id);
            	$this->template->load('template','operasi/form_edit',$this->data);
	        }
		}

		function hapus(){
			$id= $this->uri->segment(3);
	        $this->m_operasi_setting->delete($id);
	        echo '<script>
	                alert("Data berhasil  dihapus")
	              </script>';
	        $this->index();
		}
	}	
?>	