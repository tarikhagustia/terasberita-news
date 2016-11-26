<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mymodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->libraries('database');
        // $this->load->libraries('database');
    }
    public function modelLogin($table, $where)
    {
        $this->db->select('id');
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function modelLoginSession($username)
    {
        $this->db->select('id, username, email, full_name, group_id');
        $this->db->from('bo_user');
        $this->db->where(array('username' => $username));
        $query = $this->db->get();
        $hasil = $query->result_array();

        $i = 0;
        $result = array();
        foreach ($hasil as $row) {
            $result = $row;
            $result['logged_in'] = true;
        }

        return $result;
    }
		public function cek_is_active($username)
		{
			$this->db->select('key, is_active');
			$this->db->from('bo_user');
			$this->db->where('username', $username);
			$get = $this->db->get()->result();
			foreach($get as $rows):
				$data = $rows;
			endforeach;
			if($data->key == null || $data->is_active == false):
				return false;
			else:
				return true;
			endif;

		}
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */;
