<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Pendaftaran_model');
		$this->load->model('Peserta_model');
		$this->load->model('Lomba_model');
	}

	public function index(){
		$data['pendaftaran'] = $this->Pendaftaran_model->tampilPendaftaran();
		$this->load->view('pendaftaran_view.php', $data);
	}

	public function tambah(){
		$data['peserta'] = $this->Peserta_model->tampilPeserta();
		$data['lomba'] = $this->Lomba_model->tampilLomba();
		$this->load->view('tambah_pdf.php', $data);
	}

	public function insert(){
		$pdf['kode_pendaftaran']=$this->input->post('kode_pendaftaran');
		$pdf['kode_peserta']=$this->input->post('kode_peserta');
		$pdf['kode_lomba']=$this->input->post('kode_lomba');

		$query=$this->Pendaftaran_model->insertpdf($pdf);

		if ($query) {
			redirect(base_url('index.php/Pendaftaran'),'refresh');
		}
	}

	public function ubah($kode_pendaftaran)
	{
		$data['pdf']=$this->Pendaftaran_model->getpdf($kode_pendaftaran);
		$this->load->view('ubah_pdf',$data);
	}

	public function update($kode_pendaftaran)
	{
		$pdf['kode_pendaftaran']=$this->input->post('kode_pendaftaran');

		$pdf['nama']=$this->input->post('nama');
		$pdf['nama_lomba']=$this->input->post('nama_lomba');

		$query=$this->Pendaftaran_model->updatepdf($pdf,$kode_pendaftaran);

		if ($query) {
			redirect(base_url('index.php/pendaftaran'),'refresh');
		}
	}

	public function hapus($kode_pendaftaran){
	  	$query=$this->Pendaftaran_model->delpdf($kode_pendaftaran);
	    
	    if ($query) {
			redirect(base_url('index.php/Pendaftaran'),'refresh');
		}
	}
}

?>