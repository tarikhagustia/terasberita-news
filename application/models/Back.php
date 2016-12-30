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
		public function contoh($dmn, $num, $offset, $bulan = null , $creator = null)
		{
			// var_dump($dmn);
			$this->db->select('fn_news_breaking.date_to, news_url, fn_news.news_id, fn_news.news_title, fn_news.user_id, fn_news.news_timestamp, fn_news.news_views, fn_news.fokus_id, fn_fokus.fokus_name, fn_news_breaking.date_from, news_creator');
			$this->db->from('fn_news');
			$this->db->join('fn_fokus', 'fn_news.fokus_id = fn_fokus.fokus_id', 'left');
			$this->db->join('fn_news_breaking', 'fn_news_breaking.news_id = fn_news.news_id', 'left');
			if($bulan != null && $creator != null):
				$this->db->where("LEFT(fn_news.news_timestamp, 7) =", $bulan);
				$this->db->like('fn_news.news_creator', $creator);
			endif;
			$this->db->order_by('fn_news.news_timestamp', 'DESC');
			// var_dump($num);
			// var_dump($offset);

			$this->db->limit($num, $offset);
			// $this->db->where('User_id', $dmn);
			$query = $this->db->get();
			// var_dump($this->db->last_query());
			// die();
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
    public function insertFokus($table, $data)
    {
        $sql1 = $this->db->insert($table, $data);
        if ($sql1) {
            # code...
            return true;
        } else {
            return false;
        }
    }
		public function deleteFokus($where,$data,$table){
				$this->db->where($where);
				$this->db->update($table,$data);
				// var_dump($this->db->last_query());
			}
	public function deleteBreak($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function dataFokus($dmn)
	{
		// var_dump($dmn);
		$this->db->select('fn_fokus.fokus_name, fn_fokus.fokus_id');
		$this->db->from('fn_fokus');
		$query = $this->db->get();
		// var_dump($this->db->last_query());
		return $query->result_array();
		// echo "$query";
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
?>
