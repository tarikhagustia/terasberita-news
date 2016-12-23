<?php
class Peristiwa_m extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }
  public function get($url)
  {
    $this->db->select('news_timestamp, news_views, news_title, news_url, news_desc, news_thumb')->from('fn_fokus')
    ->join('fn_news', 'fn_news.fokus_id = fn_fokus.fokus_id')
    ->where('fn_fokus.fokus_url', $url);
    $get = $this->db->get()->result();
    return $get;
  }
  public function title($url)
  {
    $this->db->select('fokus_name')->from('fn_fokus')
    ->where('fokus_url', $url);
    $get = $this->db->get()->row();
    return $get;
  }
}
 ?>
