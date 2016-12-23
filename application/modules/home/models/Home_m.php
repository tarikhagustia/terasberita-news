<?php
class Home_m extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function penelusuran_img()
  {
    $this->db->select('news_thumb')->from('penelusuran')
    ->join('fn_news', 'penelusuran.news_id = fn_news.news_id');
    $get = $this->db->get()->row();
    return $get;
  }
}
 ?>
