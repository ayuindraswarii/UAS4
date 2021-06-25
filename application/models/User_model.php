<?php  
class User_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampiluser(){
		$query = $this->db->get('user');
		return $query->result();
	}

	public function insertusr($usr){
			return $this->db->insert('user',$usr);
		}

	public function getusr($kode_user){
		$query = $this->db->get_where('user', array('kode_user' => $kode_user));
		return $query->row_array();
	}

	public function updateusr($usr, $kode_user){
		$this->db->where('user.kode_user', $kode_user);
		return $this->db->update('user', $usr);
	}

	public function delusr($kode_user){
		return $this->db->where('kode_user', $kode_user)->delete('user');
	}
}