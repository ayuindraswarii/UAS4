<?php  
class Peserta_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampilPeserta(){
		$query = $this->db->get('peserta');
		return $query->result();
	}

	public function insertpst($pst){
			return $this->db->insert('peserta',$pst);
		}

	public function getpst($kode_peserta){
		$query = $this->db->get_where('peserta', array('kode_peserta' => $kode_peserta));
		return $query->row_array();
	}

	public function updatepst($pst, $kode_peserta){
		$this->db->where('peserta.kode_peserta', $kode_peserta);
		return $this->db->update('peserta', $pst);
	}

	public function delpst($kode_peserta){
		return $this->db->where('kode_peserta', $kode_peserta)->delete('peserta');
	}
		
	}
?>