 <?php  
	class Home extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_penangkapan','m_keberangkatan','m_operasi_setting','m_operasi_hauling','m_hasil_tangkap','m_pendaratan'));
			$this->user     = $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->load->library('form_validation');
		}

		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
        		$this->load->model('m_login');
                $user = $this->session->userdata('user_id');
				$this->data['lihat']['title']		= 'Aplikasi Log Book Penangkapan Ikan';
                $this->data['lihat']['level'] 		= $this->session->userdata('level');        
                $this->data['lihat']['pengguna'] 	= $this->m_login->data($user);
                $this->data['lihat']['record'] 		= $this->m_penangkapan->status();
                $this->data['lihat']['record2'] 	= $this->m_operasi_setting->status_operasi();
	            $this->data['lihat']['record3']		= $this->m_penangkapan->Select();
                $this->template->load('template','dashboard/dashboard',$this->data['lihat']);
            }
		}
		function akun(){
			if(isset($_POST['submit'])){
				$nama 				=$this->input->post('nama');
				$userid 			=$this->input->post('userid');
				$alamat				=$this->input->post('alamat');
				$data=array(
					'nama'				=>$nama,
					'userid'			=>$userid,
					'alamat'			=>$alamat
					);
				$this->m_login->updateData($data);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
        	}else{
				$user = $this->session->userdata('user_id');
				$this->data['lihat']['title']	 		= 'Akun Saya';
				$this->data['lihat']['level'] 		= $this->session->userdata('level');
				$this->data['lihat']['pengguna'] 		= $this->m_login->data($user);
				$this->template->load('template','dashboard/akun',$this->data['lihat']);
			}
		}

		function input_Penangkapan(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->form_validation->set_rules('no_kapal','Nomor Kapal','trim|required');
				$this->form_validation->set_rules('nama_kapal','Nama Kapal','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					
					$no_kapal 			=$this->input->post('no_kapal');
					$nama_kapal			=$this->input->post('nama_kapal');
					$created_at 		=date("Y-m-d");
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'no_kapal'				=>$no_kapal,
						'nama_kapal'			=>$nama_kapal,
						'created_at'			=>$created_at
						
						);
					$hasil=$this->m_penangkapan->input($data);
					echo "<script>
	                            alert('Data Penangkapan Tersimpan')
	                        </script>";
				}
				$this->index();
			}
		}

		function inputKeberangkatan(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->form_validation->set_rules('jml_bbm','Jumlah BBM','trim|required');
				$this->form_validation->set_rules('jml_es','Jumlah Es','trim|required');
				$this->form_validation->set_rules('pelabuhan','Pelabuhan','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					$id 				=$this->input->post('id_penangkapan');
					$jml_bbm 			=$this->input->post('jml_bbm');
					$jml_es				=$this->input->post('jml_es');
					$pelabuhan 			=$this->input->post('pelabuhan');
					$tgl				=$this->input->post('tanggal');
					$jam				=$this->input->post('jam');
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'id_penangkapan'		=>$id,
						'bbm'					=>$jml_bbm,
						'es'					=>$jml_es,
						'pelabuhan'				=>$pelabuhan,
						'tgl'					=>$tgl,
						'jam'					=>$jam
						
						);
					$id 				=$this->input->post('id_penangkapan');
					$this->m_keberangkatan->input($data);
					echo "<script>
	                            alert('Data Keberangkatan Tersimpan')
	                        </script>";
				
					$this->index();
				}
			}	
		}

		function input_setting(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->form_validation->set_rules('jenis_alat','Jenis Alat','trim|required');
				$this->form_validation->set_rules('lat','Latitude','trim|required');
				$this->form_validation->set_rules('lng','Longitude','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					$id 				=$this->input->post('id_penangkapan');
					$jenis_alat 		=$this->input->post('jenis_alat');
					$lat				=$this->input->post('lat');
					$lng 				=$this->input->post('lng');
					$tgl				=$this->input->post('tanggal');
					$jam				=$this->input->post('jam');
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'id_penangkapan'		=>$id,
						'jenis_alat'			=>$jenis_alat,
						'lat'					=>$lat,
						'lng'					=>$lng,
						'tgl'					=>$tgl,
						'jam'					=>$jam
						
						);
					$id 				=$this->input->post('id_penangkapan');
					$this->m_operasi_setting->input($data);
					echo "<script>
	                            alert('Data Operasi Setting Tersimpan')
	                        </script>";
					$this->index();
					
				}
			}	
		}

		function input_hauling(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->form_validation->set_rules('jenis_alat','Jenis Alat','trim|required');
				$this->form_validation->set_rules('lat','Latitude','trim|required');
				$this->form_validation->set_rules('lng','Longitude','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					$id 				=$this->input->post('id_penangkapan');
					$jenis_alat 		=$this->input->post('jenis_alat');
					$lat				=$this->input->post('lat');
					$lng 				=$this->input->post('lng');
					$tgl				=$this->input->post('tanggal');
					$jam				=$this->input->post('jam');
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'id_penangkapan'		=>$id,
						'jenis_alat'			=>$jenis_alat,
						'lat'					=>$lat,
						'lng'					=>$lng,
						'tgl'					=>$tgl,
						'jam'					=>$jam
						
						);
					$id 				=$this->input->post('id_penangkapan');
					$this->m_operasi_hauling->input($data);
					echo "<script>
	                            alert('Data Operasi Hauling Tersimpan')
	                        </script>";
				
					$this->index();
				}
			}	
		}

		function inputPendaratan(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->form_validation->set_rules('pelabuhan','Pelabuhan','trim|required');
				if($this->form_validation->run()==FALSE){
					$this->index();
				}else{
					$id 				=$this->input->post('id');
					$pelabuhan 			=$this->input->post('pelabuhan');
					$tgl				=$this->input->post('tanggal');
					$jam				=$this->input->post('jam');
					$data=array(
						'id_pengguna'			=>$this->session->userdata('id_pengguna'),
						'id_penangkapan'		=>$id,
						'pelabuhan'				=>$pelabuhan,
						'tgl'					=>$tgl,
						'jam'					=>$jam
						
						);
					$id 				=$this->input->post('id');
					$hasil=$this->m_pendaratan->input($data);
					echo "<script>
	                            alert('Data pendaratan Tersimpan')
	                        </script>";
				}
				$this->index();
			}
		}

		function edit(){
			if(isset($_POST['submit'])){
				$id 				=$this->input->post('id');
				$nama 				=$this->input->post('nama');
				$userid 			=$this->input->post('userid');
				$alamat				=$this->input->post('alamat');
				$data=array(
					'nama_pengguna'		=>$nama,
					'user_id'			=>$userid,
					'alamat'			=>$alamat
					);
				$this->m_login->updateData($data,$id);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
	        }else{
	        	$this->data['pengguna']=$this->m_login->data($this->user);
	        	$id=  $this->uri->segment(3);
	        	$this->data['title']='Edit Data Pengguna';
	        	$this->data['record'] = $this->m_login->updateProfile($id);
            	$this->template->load('template','dashboard/edit_pengguna',$this->data);
	        }
		}
		
	}
?>