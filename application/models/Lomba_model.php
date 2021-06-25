<?php  
class Lomba_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampilLomba(){
		$query = $this->db->get('lomba');
		return $query->result();
	}

	public function insertlmb($lmb){
		return $this->db->insert('lomba',$lmb);
	}

	public function getlmb($kode_lomba){
		$query = $this->db->get_where('lomba', array('kode_lomba' => $kode_lomba));
		return $query->row_array();
	}

	public function updatelmb($lmb, $kode_lomba){
		$this->db->where('lomba.kode_lomba', $kode_lomba);
		return $this->db->update('lomba', $lmb);
	}

	public function dellmb($kode_lomba){
		return $this->db->where('kode_lomba', $kode_lomba)->delete('lomba');
	}
}