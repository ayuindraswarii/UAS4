<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

	public function index()
	{
		$this->load->view('login_view');
	}

  	public function proses(){
		$this->form_validation->set_rules('username_user', 'Username', 'trim|required',array('required'=>'Username harus diisi'));
		$this->form_validation->set_rules('password_user', 'Password', 'trim|required',array('required'=>'Password harus diisi'));
		if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('result_login', validation_errors());
				redirect(base_url('index.php/Login'));
			} else {
				$cek_login=$this->Login_model->get_login();
				if($cek_login->num_rows()>0){
					$data_login=$cek_login->row();
					$array = array(
						'kode_user' => $data_login->kode_user,
						'nama_user'=>$data_login->nama_user,
						'username_user'=>$data_login->username_user,
						'password_user'=>$data_login->password_user,
						'login'=>true
					);
					
					$this->session->set_userdata($array);
					redirect(base_url('index.php/Template'));
				} else {
					$this->session->set_flashdata('result_login', 'username dan password tidak cocok');
					redirect(base_url('index.php/Login'));
				}
			}	
	}

    public function logout() {
        $this->session->sess_destroy();
        redirect('index.php/Login');
    }

}