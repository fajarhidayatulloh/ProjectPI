<?php  

	class Keberangkatan extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_keberangkatan','m_penangkapan'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->data['title']		='Input Data Keberangkatan';
				$this->data['title2']		='Laporan Data Keberangkatan';
	            $this->data['pengguna'] 	= $this->m_login->data($this->user);
	            $this->data['record'] 		= $this->m_keberangkatan->ambilData();
	            $this->data['record2'] 		= $this->m_penangkapan->ambilData();
	            $this->template->load('template','Keberangkatan/lihat_data',$this->data);
            }
		}

		function direct_keberangkatan(){
			$this->data['lihat']['title']		='Input Data Keberangkatan';
			$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
			$this->data['lihat']['r'] 			= $this->m_penangkapan->Select();
			$this->template->load('template','Keberangkatan/form_keberangkatan',$this->data['lihat']);
		}

		

		public function edit(){
			if(isset($_POST['submit'])){
				$id 				=$this->input->post('id');
				$jml_bbm 			=$this->input->post('jml_bbm');
				$jml_es				=$this->input->post('jml_es');
				$data=array(
					'bbm'				=>$jml_bbm,
					'es'				=>$jml_es
					);
				$this->m_keberangkatan->updateData($id,$data);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
	        }else{
	        	$this->data['pengguna']=$this->m_login->data($this->user);
	        	$id=  $this->uri->segment(3);
	        	$this->data['title']='Edit Data Keberangkatan';
	        	$this->data['record'] = $this->m_keberangkatan->getOne($id);
            	$this->template->load('template','keberangkatan/form_edit',$this->data);
	        }
		
		}

		function hapus(){
			$id= $this->uri->segment(3);
	        $this->m_keberangkatan->delete($id);
	        echo '<script>
	                alert("Data berhasil  dihapus")
	              </script>';
	        $this->index();
		}
	}
?>