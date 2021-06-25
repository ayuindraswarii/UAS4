<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function get_login()
		{
			return $this->db
			->where('username_user',$this->input->post('username_user'))
			->where('password_user',$this->input->post('password_user'))
			->get('user');
		}	

}