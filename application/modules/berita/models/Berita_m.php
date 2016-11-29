<?php
class Berita_m extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  private function get_category_id($kanal_name)
  {

  }
  public function get_feed($category_name)
  {
    $this->db->select('news_url, fn_news.news_id, fn_category.category_id, news_title, news_thumb, news_timestamp, news_views');
    $this->db->from('fn_news');
    $this->db->join('fn_pages', 'fn_news.news_id = fn_pages.news_id');
    $this->db->join('fn_category', 'fn_pages.category_id = fn_category.category_id');
    $this->db->where('fn_category.category_name', $category_name);
    $this->db->order_by('fn_news.news_timestamp', 'DESC');
    $this->db->limit(20);
    $get = $this->db->get()->result();
    return $get;
    // $query = $this->db->query('SELECT news_url, fn_news.news_id, fn_category.category_id, news_title, news_desc AS descriptions,news_thumb
    //   FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id`
    //   AND fn_pages.`category_id` = fn_category.`category_id`
    //   AND fn_category.category_id = "'.$category_id.'" ORDER BY news_views DESC LIMIT 0,1');
    // foreach ($query->result() as $key => $value) {
    //     // code...
    //     $data = $value;
    // }
    // return @$data;
  }
}
 ?>
