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
      	return $query;
	}

	public function insertpdf($pdf){
		return $this->db->insert('pendaftaran',$pdf);
	}

	public function getpdf($kode_pendaftaran){

      	$result = $this->db->query("
      		SELECT pst.nama, lmb.nama_lomba, pdf.kode_pendaftaran, pst.kode_peserta, lmb.kode_lomba,
      		(CASE WHEN pdf.kode_pendaftaran = '$kode_pendaftaran' THEN 0 else 1 END) AS sort
			from pendaftaran pdf
			JOIN peserta pst ON pst.kode_peserta = pdf.kode_peserta
			JOIN lomba lmb ON lmb.kode_lomba = pdf.kode_lomba
			ORDER BY sort", FALSE);

      	$query = $result->result();
      	return $query;
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