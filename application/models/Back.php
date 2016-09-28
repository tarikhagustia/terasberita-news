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
	public function insertData($table, $data)
    {
        $sql1 = $this->db->insert($table, $data);
        if ($sql1) {
            # code...
            return true;
        } else {
            return false;
        }
    }
    public function contoh($dmn)
	{
		// var_dump($dmn);
		$this->db->select('*');
		$this->db->from('fn_news');
		$this->db->where('User_id', $dmn);
		// $this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
		// echo "$query";
	}
	public function getDatanews($dmn, $col)
	{
		$this->db->select($col);
		$this->db->from('fn_news, bo_user');
		$this->db->where('bo_user.id = fn_news.user_id');
		$this->db->where('fn_news.news_id', $dmn);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function updataData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function deleteData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function insertBrek($table, $data)
    {
        $sql1 = $this->db->insert($table, $data);
        if ($sql1) {
            # code...
            return true;
        } else {
            return false;
        }
    }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>