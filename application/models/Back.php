<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Model {

	public function getData($table, $col)
	{
		$this->db->select($col);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>