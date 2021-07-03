<?php  
class Pendaftaran_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampilpendaftaran(){
		$this->db->select('*');
 		$this->db->from('pendaftaran');
		$this->db->join('peserta','peserta.kode_peserta = pendaftaran.kode_peserta');
      	$this->db->join('lomba','lomba.kode_lomba = pendaftaran.kode_lomba');      
      	$query = $this->db->get()->result();
      	// var_dump($query);
      	// exit();
      	return $query;
	}

	public function insertpdf($pdf){
		return $this->db->insert('pendaftaran',$pdf);
	}

	public function getpdf($kode_pendaftaran){

		$arr = [];

		$this->db->select('*');
 		$this->db->from('pendaftaran');
		$this->db->join('peserta','peserta.kode_peserta = pendaftaran.kode_peserta');
		$this->db->join('lomba','lomba.kode_lomba = pendaftaran.kode_lomba');
 		$this->db->where('pendaftaran.kode_pendaftaran =', $kode_pendaftaran, FALSE);
      	$nama = $this->db->get()->result(); 
      	$kode_lomba_peserta = $nama[0]->kode_lomba; 

      	$this->db->select('*');
 		$this->db->from('lomba');
 		$this->db->where('lomba.kode_lomba <>', $kode_lomba_peserta);
      	$lomba = $this->db->get()->result();

      	array_push($arr, $nama, $lomba);
      	return $arr;
	}

	public function updatepdf($pdf, $kode_pendaftaran){
		$this->db->where('pendaftaran.kode_pendaftaran', $kode_pendaftaran);
		return $this->db->update('pendaftaran', $pdf);
	}

	public function delpdf($kode_pendaftaran){
		return $this->db->where('kode_pendaftaran', $kode_pendaftaran)->delete('pendaftaran');
	}
		
	}
?>