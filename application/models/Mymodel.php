<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {


	public function __construct() 
	{       
		parent::__construct();
		// $this->load->libraries('database');
        // $this->load->libraries('database');

	}
	public function modelLogin($table, $where){
		$this->db->select('id');
		$query = $this->db->get_where($table, $where);
		if ($query->num_rows() >= 1) {
			return true;
		}else{
			return false;
		}
	}
	public function modelLoginSession($username){
		$this->db->select('username, email, full_name');
		$this->db->from('bo_user');
		$this->db->where(array('username' => $username));
		$query = $this->db->get();
		$hasil = $query->result_array();
		
		$i = 0;
		foreach($hasil as $row){
			$result = $row;
			$result['logged_in'] = TRUE;
		}
		return $result;
	}

}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */
?>