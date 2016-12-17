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
    $this->db->select('news_url, fn_news.news_id, fn_category.category_id, news_title, news_thumb, news_timestamp, news_views , news_desc');
    $this->db->from('fn_news');
    $this->db->join('fn_pages', 'fn_news.news_id = fn_pages.news_id');
    $this->db->join('fn_category', 'fn_pages.category_id = fn_category.category_id');
    if($category_name != null):
      $this->db->where('fn_category.category_name', $category_name);
    endif;
    $this->db->order_by('fn_news.news_timestamp', 'DESC');
    $this->db->group_by('fn_news.news_id');
    $this->db->limit(20);
    $get = $this->db->get()->result();
    return $get;
  }
  public function get_popular($kanal)
  {
    $this->db->select('news_url, fn_news.news_id, fn_category.category_id, news_title, news_thumb, news_timestamp, news_views');
    $this->db->from('fn_news');
    $this->db->join('fn_pages', 'fn_news.news_id = fn_pages.news_id');
    $this->db->join('fn_category', 'fn_pages.category_id = fn_category.category_id');
    if($category_name != null):
      $this->db->where('fn_category.category_name', $category_name);
    endif;
    $this->db->group_by('fn_news.news_id');
    $this->db->order_by('fn_news.news_views', 'DESC');
    $this->db->limit(6);
    $get = $this->db->get()->result();
    return $get;
  }
  public function get_tkp($kanal)
  {
    $this->db->select('fn_indeph.`indeph_id`, fn_news.news_id, news_title, news_url, news_thumb, news_desc, fn_category.category_id')
    ->from('fn_indeph')
    ->join('fn_news', 'fn_indeph.news_id = fn_news.news_id')
    ->join('fn_pages', 'fn_pages.news_id = fn_news.news_id')
    ->join('fn_category', 'fn_pages.category_id = fn_category.category_id');
    // ->where('date_from <=' , date('Y-m-d H:i:s'))
    // ->where('date_to >=', date('Y-m-d H:i:s'))
    if($kanal != NULL):
      $this->db->where('fn_category.category_name' , $kanal);
    endif;
    $this->db->order_by('indeph_timestamp', 'DESC');
    $get = $this->db->get()->row();
    return $get;
  }
  public function get_peoplesay($kanal)
  {
    $this->db->select('news_title, news_url, news_thumb, news_desc, peoplesay.created_at')->from('fn_news')
    ->join('peoplesay', 'fn_news.news_id = peoplesay.news_id');
    $get = $this->db->get()->result();
    return $get;
  }
  public function get_breaking($kanal)
  {
    if($kanal == null):
      $this->db->select('news_title, news_url, news_thumb, news_timestamp')
      ->from('breaking')
      ->join('fn_news', 'breaking.news_id = fn_news.news_id');
      $get = $this->db->get()->result();
      return $get;
    else:
      $this->db->select('news_title, news_url, news_desc, category_alias, news_thumb, fn_news.news_id, news_timestamp, news_views')->from('fn_news_breaking')
      ->join('fn_news', 'fn_news_breaking.news_id = fn_news.news_id')
      ->join('fn_pages' , 'fn_pages.news_id = fn_news.news_id')
      ->join('fn_category', 'fn_pages.category_id = fn_category.category_id')
      // ->where('date_from <=', date('Y-m-d H:i:s'))
      // ->where('date_to >=', date('Y-m-d H:i:s'))
      ->where('fn_news_breaking.isActive', true)
      ->order_by('breaking_timestamp', 'DESC')
      ->limit(1);
      $get = $this->db->get()->row();
      return $get;
    endif;
  }

  public function get_aktualitas($kanal)
  {
    $this->db->select('news_title, news_url, news_thumb, news_desc')->from('fn_news')
    ->join('aktualitas', 'fn_news.news_id = aktualitas.news_id');
    $get = $this->db->get()->row();
    return $get;
  }
  public function get_wiskul()
  {
    $this->db->select('news_title, news_url, news_thumb, news_timestamp')
    ->from('fn_category')
    ->join('fn_pages', 'fn_pages.category_id = fn_category.category_id')
    ->join('fn_news', 'fn_pages.news_id = fn_news.news_id')
    ->where('category_name', 'wisata-kuliner')
    ->order_by('news_timestamp', 'DESC')
    ->limit(6);
    $get = $this->db->get()->result();
    return $get;
  }
  public function get_peristiwa()
  {
    $this->db->select('fokus_comment, fn_fokus.fokus_id, fokus_url, fokus_name')->from('fn_fokus')
    ->join('fn_news', 'fn_news.fokus_id = fn_fokus.fokus_id')
    ->join('fn_pages', 'fn_news.news_id = fn_pages.news_id')
    ->join('fn_category', 'fn_category.category_id = fn_category.category_id')
    ->group_by('fn_fokus.fokus_id')
    ->order_by('fokus_timestamp', 'DESC')
    ->limit(10);
    $get = $this->db->get()->result();
    return $get;
  }
}
 ?>
