<?php  

	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
            $this->load->model('m_login');
            $this->load->library('form_validation');
		}

		public function index(){
			$session = $this->session->userdata('Login');
            if($session != 'berhasil'){
                
                $this->load->view('form_login');
            }else{
                redirect('home');
            }
		}

		public function login_form(){
			$this->form_validation->set_rules('user_id', 'ID Pengguna', 'required|trim');
            $this->form_validation->set_rules('password', 'Kata Sandi', 'required|md5');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->load->view('form_login');
            }else{
            	$user_id = $this->input->post('user_id');
                $password = $this->input->post('password');
                $cek= $this->m_login->getPengguna($user_id, $password,1);
                if($cek->num_rows() == 1){
                	foreach ($cek->result() as $c) {
                        $data_user['Login']       	= 'berhasil';
                        $data_user['user_id']    	= $c->user_id;
                        $data_user['id_pengguna']   = $c->id_pengguna;
                        $data_user['nama_pengguna'] = $c->nama_pengguna;
                        $data_user['level']       	= $c->level;        
                    }
                    if($data_user['level']==1){
                        $this->session->set_userdata($data_user);
                        redirect('home');
                    }else{
                    	echo " <script>
                               alert('Gagal Masuk: Cek ID Pengguna dan password anda!!!');
                               history.go(-1);
                    		   </script>";     
                    }
                }else{
                    echo " <script>
                            alert('Gagal Masuk: Cek ID Pengguna dan password anda!!!');
                            history.go(-1);
                        	</script>";
                }
            } 
		}

		public function logout(){
            $this->session->sess_destroy();
            redirect('login');
        }
	}
?>