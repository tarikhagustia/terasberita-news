<?php
class Article_m extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function get_article($news_url)
  {
    $this->db->select('fn_news.news_id, news_creator, caption, category_alias, fn_category.category_id, news_title, news_desc, news_thumb, news_timestamp, bo_user.`full_name`')
    ->from('fn_news')
    ->join('fn_pages', 'fn_news.news_id = fn_pages.news_id')
    ->join('fn_category', 'fn_pages.category_id = fn_category.category_id')
    ->join('bo_user', 'fn_news.user_id = bo_user.id')
    ->where('fn_news.news_url', $news_url);
    $get = $this->db->get();
    foreach($get->result() as $rows):
      return $rows;
    endforeach;
  }
}
 ?>
