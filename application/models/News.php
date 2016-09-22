<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

    }
    public function index()
    {
        return "Haha";
    }
     public function getData($table, $col, $where = array(1 => 1))
    {
        $this->db->select($col);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getNewsFromPage($category_id){
      $result = $this->db->query("SELECT news_url, news_thumb, fn_pages.`category_id`, fn_pages.`pages_id`, news_title, category_alias,  SUBSTR(news_desc, 1, 200) AS news_desc, fn_news.`news_timestamp` FROM fn_pages, fn_category, fn_news WHERE fn_pages.`category_id` = fn_category.`category_id` AND fn_pages.`news_id` = fn_news.`news_id` AND fn_pages.category_id = '$category_id' ORDER BY fn_news.news_timestamp DESC");
      return $result->result();
    }
    public function getNewsFromArticle($news_url = null){
      $result = $this->db->query("SELECT
                  fn_news.news_id,
                  category_alias,
                  news_title,
                  news_desc,
                  news_thumb,
                  news_timestamp,
                  bo_user.`full_name`
                FROM
                  fn_news,
                  fn_pages,
                  fn_category,
                  bo_user
                WHERE fn_news.`user_id` = bo_user.`id`
                  AND fn_news.`news_id` = fn_pages.`news_id`
                  AND fn_pages.`category_id` = fn_category.`category_id`
                  AND fn_news.news_url = '$news_url'");
      $data_array = $result->result();
      foreach ($data_array as $key => $value) {
        # code...
        $data = $value;
      }
      return $data;
    }
    public function getPopularNewsByCatgory($category_id){
      $query = $this->db->query('SELECT news_url, fn_news.news_id, fn_category.category_id, news_title, SUBSTR(news_desc, 1, 50) AS descriptions, news_thumb FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fn_category.category_id = "'.$category_id.'" AND fn_news.news_id != (SELECT news_id FROM fn_news ORDER BY news_views DESC LIMIT 1) ORDER BY news_views DESC');
      foreach ($query->result() as $key => $value) {
        # code...
        $data[] = $value;
      }
      return @$data;
    }
    public function getPopularNewsByCatgoryOnlyOne($category_id){
      $query = $this->db->query('SELECT news_url, fn_news.news_id, fn_category.category_id, news_title, SUBSTR(news_desc, 1, 50) AS descriptions, news_thumb FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fn_category.category_id = "'.$category_id.'" ORDER BY news_views DESC LIMIT 0,1');
      foreach ($query->result() as $key => $value) {
        # code...
        $data = $value;
      }
      return @$data;
    }
    public function getTerasPeristiwa($category_id = null){
      $query = $this->db->query("SELECT fokus_comment, fn_fokus.`fokus_id`, fokus_url, fokus_name FROM fn_fokus, fn_news, fn_pages, fn_category WHERE fn_news.news_id = fn_pages.news_id AND fn_pages.category_id = fn_category.category_id AND fn_fokus.`fokus_id` = fn_news.`fokus_id` AND fn_category.category_id = '$category_id' GROUP BY fn_fokus.`fokus_id` ORDER BY fn_news.`news_timestamp` DESC LIMIT 0,10");
      return $query->result();
    }
    public function getNewsFromFokusWithUrl($fokus_url = null){
      $query = "SELECT fn_news.`news_title`, news_url, SUBSTR(news_desc, 1 , 100) AS descs, news_thumb, news_timestamp, category_alias FROM fn_fokus, fn_news, fn_pages, fn_category WHERE fn_fokus.`fokus_id` = fn_news.`fokus_id` AND fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fokus_url = '$fokus_url' ORDER BY fn_news.`news_timestamp` DESC";
      return $this->db->query($query)->result();

    }
    public function getIndeph($category_id = null){
      $query = $this->db->query("SELECT 
                fn_indeph.`indeph_id`,
                news_title,
                news_url,
                news_thumb,
                news_desc,
                fn_category.category_id
              FROM
                fn_indeph,
                fn_news,
                fn_pages,
                fn_category 
              WHERE fn_indeph.`news_id` = fn_news.`news_id` 
                AND fn_news.`news_id` = fn_pages.`news_id` 
                AND fn_pages.`category_id` = fn_category.`category_id` 
                AND date_from <= NOW() 
                AND date_to >= NOW() 
                AND fn_category.category_id = '$category_id'
              ORDER BY fn_indeph.`indeph_timestamp` DESC 
              LIMIT 1 ");
      foreach($query->result() as $key => $rows){
        $data = $rows;
      }
      return @$data;
    }
}

/* End of file shop_model.php */
/* Location: ./application/models/shop_model.php */
