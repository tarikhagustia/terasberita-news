<?php
class Sitemaps extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->db->select('news_url, news_timestamp')->from('fn_news')
    ->order_by('news_timestamp', 'DESC')
    ->limit(500);
    $get = $this->db->get()->result();
    $this->load->view('sitemaps_v', ['data' => $get]);
  }
}
?>
