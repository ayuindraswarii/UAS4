<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Lomba extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Lomba_model');
	}

	public function index(){
		$data['lomba'] = $this->Lomba_model->tampilLomba();
		$this->load->view('lomba_view.php', $data);
	}

	public function tambah(){
		$this->load->view('tambah_lmb.php');
	}

	public function insert(){
		$lmb['kode_lomba']=$this->input->post('kode_lomba');
		$lmb['nama_lomba']=$this->input->post('nama_lomba');
		$lmb['harga']=$this->input->post('harga');

		$query=$this->Lomba_model->insertlmb($lmb);

		if ($query) {
			redirect(base_url('index.php/Lomba'),'refresh');
		}
	}

	public function ubah($kode_lomba)
	{
		$data['lmb']=$this->Lomba_model->getlmb($kode_lomba);
		$this->load->view('ubah_lmb',$data);
	}

	public function update($kode_lomba)
	{
		$lmb['kode_lomba']=$this->input->post('kode_lomba');
		$lmb['nama_lomba']=$this->input->post('nama_lomba');
		$lmb['harga']=$this->input->post('harga');

		$query=$this->Lomba_model->updatelmb($lmb,$kode_lomba);

		if ($query) {
			redirect(base_url('index.php/Lomba'),'refresh');
		}
	}

	public function hapus($kode_lomba){
	  	$query=$this->Lomba_model->dellmb($kode_lomba);
	    
	    if ($query) {
			redirect(base_url('index.php/Lomba'),'refresh');
		}
	}
}

?>