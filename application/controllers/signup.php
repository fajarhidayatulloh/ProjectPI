<?php  

	class Signup extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('m_login');
			$this->load->database();
		}

		function index(){
			$this->data['title']='Daftar';
			$this->load->view('daftar',$this->data);
		}

		function input(){
			$nama 				=$this->input->post('nama');
			$user				=$this->input->post('userid');
			$password 			=$this->input->post('password');
			$alamat				=$this->input->post('alamat');
			$data=array(
						'nama_pengguna'	    =>$nama,
						'user_id'			=>$user,
						'password'			=>md5($password),
						'alamat'			=>$alamat,
						'level'				=>'1'
						
						);
			$hasil=$this->m_login->input($data);
			redirect('login');
		}
	}
?>