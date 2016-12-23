<?php
class Ads_m extends CI_Model
{
  public function get_leaderboard($kanal)
  {
    $this->db->select('*')->from('fn_layout');
    $this->db->where('layout_location', $kanal);
    $this->db->where('layout_name', 'LA');
    $get = $this->db->get()->row();
    return $get;
  }
}
 ?>
