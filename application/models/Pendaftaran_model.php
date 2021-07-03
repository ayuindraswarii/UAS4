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

   //    	$result = $this->db->query("
   //    		SELECT pst.nama, lmb.nama_lomba, pdf.kode_pendaftaran, pst.kode_peserta, lmb.kode_lomba,
   //    		(CASE WHEN pdf.kode_pendaftaran = '$kode_pendaftaran' THEN 0 else 1 END) AS sort
			// from pendaftaran pdf
			// JOIN peserta pst ON pst.kode_peserta = pdf.kode_peserta
			// LEFT JOIN lomba lmb ON lmb.kode_lomba = pdf.kode_lomba
			// ORDER BY sort", FALSE);
		$this->db->select('*');
 		$this->db->from('pendaftaran');
		$this->db->join('peserta','peserta.kode_peserta = pendaftaran.kode_peserta');
 		$this->db->where('pendaftaran.kode_pendaftaran =', $kode_pendaftaran, FALSE);
      	$names = $this->db->get()->result(); 

   //    	$this->db->select('*');
 		// $this->db->from('lomba');
   //    	$lomba = $this->db->get()->result(); 

      	$lomba = $this->db->query("
      	SELECT DISTINCT lmb.kode_lomba, lmb.nama_lomba,
      	(CASE WHEN pdf.kode_pendaftaran = '$kode_pendaftaran' THEN 0 else 1 END) AS sort
		from pendaftaran pdf
		RIGHT JOIN lomba lmb ON pdf.kode_lomba = lmb.kode_lomba
		ORDER BY sort, lmb.kode_lomba", FALSE);
      	$lombaa = $lomba->result();

      	array_push($arr, $names, $lombaa);
      	// $query = $result->result();
      	// var_dump($names);
      	// exit();
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