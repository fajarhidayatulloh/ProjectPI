<?php  

	class Pendaratan extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model(array('m_login','m_pendaratan','m_penangkapan','m_operasi_setting'));
			$this->user     	= $this->session->userdata('user_id');
            $this->id_pengguna  = $this->session->userdata('id_pengguna');
            $this->level 		= $this->session->userdata('level');
            $this->load->library('form_validation');
		}
		function index(){
			if($this->session->userdata('level') != 1){
            	redirect('login');
        	}else{
				$this->data['lihat']['title']		='Laporan Data Pendaratan';
	            $this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
	            $this->data['lihat']['record'] 			= $this->m_pendaratan->ambilData();
	            $this->template->load('template','pendaratan/lihat_data',$this->data['lihat']);
            }
		}

		function direct_pendaratan(){
			$this->data['lihat']['title']		='Input Data Pendaratan';
			$this->data['lihat']['pengguna'] 	= $this->m_login->data($this->user);
			$this->data['lihat']['r'] 			= $this->m_penangkapan->Select();
			$this->data['lihat']['r2'] 			= $this->m_operasi_setting->status_operasi();
			$this->template->load('template','pendaratan/form_pendaratan',$this->data['lihat']);
		}

		function edit(){
			if(isset($_POST['submit'])){
				$id 				=$this->input->post('id');
				$pelabuhan 			=$this->input->post('pelabuhan');
				$data=array(
					'pelabuhan'				=>$pelabuhan
					
					);
				
				$hasil=$this->m_pendaratan->updateData($id,$data);
					echo "<script>
	                            alert('Data Telah Diubah')
	                        </script>";
	                  $this->index();
	        }else{
	        	$this->data['pengguna']=$this->m_login->data($this->user);
	        	$id=  $this->uri->segment(3);
	        	$this->data['title']='Edit Data Pendaratan';
	        	$this->data['record'] = $this->m_pendaratan->getOne($id);
            	$this->template->load('template','pendaratan/form_edit',$this->data);
	        }
		}

		function hapus(){
			$id= $this->uri->segment(3);
	        $this->m_pendaratan->delete($id);
	        echo '<script>
	                alert("Data berhasil  dihapus")
	              </script>';
	        $this->index();
		}
	}
?>