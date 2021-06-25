<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index(){
		$data['user'] = $this->User_model->tampilUser();
		$this->load->view('user_view.php', $data);
	}

	public function tambah(){
		$this->load->view('tambah_usr.php');
	}

	public function insert(){
		$usr['kode_user']=$this->input->post('kode_user');
		$usr['nama_user']=$this->input->post('nama_user');
		$usr['username_user']=$this->input->post('username_user');
		$usr['password_user']=$this->input->post('password_user');

		$query=$this->User_model->insertusr($usr);

		if ($query) {
			redirect(base_url('index.php/user'),'refresh');
		}
	}

	public function ubah($kode_user)
	{
		$data['usr']=$this->User_model->getusr($kode_user);
		$this->load->view('ubah_usr',$data);
	}

	public function update($kode_user)
	{
		$usr['kode_user']=$this->input->post('kode_user');
		$usr['nama_user']=$this->input->post('nama_user');
		$usr['username_user']=$this->input->post('username_user');
		$usr['password_user']=$this->input->post('password_user');

		$query=$this->User_model->updateusr($usr,$kode_user);

		if ($query) {
			redirect(base_url('index.php/user'),'refresh');
		}
	}

	public function hapus($kode_user){
	  	$query=$this->User_model->delusr($kode_user);
	    
	    if ($query) {
			redirect(base_url('index.php/user'),'refresh');
		}
	}
}

?>