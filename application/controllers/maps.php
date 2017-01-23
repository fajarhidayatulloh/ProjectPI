<?php  

	class Maps extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_lokasi','m_penangkapan'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
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
	           		$this->template->load('template','maps/map',$this->data['lihat']);
	           	}else{
	           		$this->data['lihat']['title']		='Cari Lokasi';
					$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
		            $this->template->load('template','maps/map',$this->data['lihat']);
	           	}
			}
		}

		function input_lokasi(){
			$this->form_validation->set_rules('lat','lat','trim|required');
			$this->form_validation->set_rules('lng','lng','trim|required');
			if($this->form_validation->run()==FALSE){
				$this->index();
			}else{
					
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
	            $this->template->load('template','maps/mapsi',$this->data['lihat']);
			}
		}

		function direct_hasil_tangkap(){
			$id=  $this->uri->segment(3);
			$this->data['lihat']['title']		='Input Data Hasil Tangkap';
			$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
			$this->template->load('template','hasil_tangkap/form_hasil_tangkap',$this->data['lihat']);
		}
	}
?>