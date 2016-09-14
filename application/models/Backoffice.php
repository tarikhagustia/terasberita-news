<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Model {

	public function getData($table, $col, $where)
	{
		$this->db->select($col);
		$this->db->from($table);
		$this->where($where);
		$query = $this->get();
		return $query->result_array();
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>