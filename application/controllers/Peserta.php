<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Peserta_model');
	}

	public function index(){
		$data['peserta'] = $this->Peserta_model->tampilPeserta();
		$this->load->view('peserta_view.php', $data);
	}

	public function tambah(){
		$this->load->view('tambah_pst.php');
	}

	public function insert(){
		$pst['nama']=$this->input->post('nama');
		$pst['kelas']=$this->input->post('kelas');
		$pst['sekolah']=$this->input->post('sekolah');
		$pst['asal_kota']=$this->input->post('asal_kota');

		$query=$this->Peserta_model->insertpst($pst);

		if ($query) {
			header(base_url('Peserta'));
		}
	}

	public function ubah($kode_peserta)
	{
		$data['pst']=$this->Peserta_model->getpst($kode_peserta);
		$this->load->view('ubah_pst',$data);
	}

	public function update($kode_peserta)
	{
		$pst['nama']=$this->input->post('nama');
		$pst['kelas']=$this->input->post('kelas');
		$pst['sekolah']=$this->input->post('sekolah');
		$pst['asal_kota']=$this->input->post('asal_kota');	

		$query=$this->Peserta_model->updatepst($pst,$kode_peserta);

		if ($query) {
			redirect(base_url('index.php/Peserta'),'refresh');
		}
	}

	public function hapus($kode_peserta){
	  	$query=$this->Peserta_model->delpst($kode_peserta);
	    
	    if ($query) {
			redirect(base_url('index.php/Peserta'),'refresh');
		}
	}
}

?>