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
    public function getNewsFromPage($category_id)
    {
        $result = $this->db->query("SELECT news_url, news_thumb, fn_pages.`category_id`, fn_pages.`pages_id`, news_title, category_alias, news_desc AS news_desc, fn_news.`news_timestamp` FROM fn_pages, fn_category, fn_news WHERE fn_pages.`category_id` = fn_category.`category_id` AND fn_pages.`news_id` = fn_news.`news_id` AND fn_pages.category_id = '$category_id' ORDER BY fn_news.news_timestamp DESC");
        return $result->result();
    }
    public function getNewsFromArticle($news_url = null)
    {
        $result = $this->db->query("SELECT
                  fn_news.news_id,
                  category_alias,
                  fn_category.category_id,
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
    public function getPopularNewsByCatgory($category_id, $news_id)
    {
        $query = $this->db->query('SELECT news_timestamp, category_alias, news_url, fn_news.news_id, fn_category.category_id, news_title, news_desc AS descriptions, news_thumb FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fn_category.category_id = "' . $category_id . '" AND fn_news.news_id != "' . $news_id . '" ORDER BY news_views DESC');
        foreach ($query->result() as $key => $value) {
            # code...
            $data[] = $value;
        }
        return @$data;
    }
    public function getPopularNewsByCatgoryOnlyOne($category_id)
    {
        $query = $this->db->query('SELECT news_url, fn_news.news_id, fn_category.category_id, news_title, news_desc AS descriptions, news_thumb FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fn_category.category_id = "' . $category_id . '" ORDER BY news_views DESC LIMIT 0,1');
        foreach ($query->result() as $key => $value) {
            # code...
            $data = $value;
        }
        return @$data;
    }
    public function getTerasPeristiwa($category_id = null)
    {
        $query = $this->db->query("SELECT fokus_comment, fn_fokus.`fokus_id`, fokus_url, fokus_name FROM fn_fokus, fn_news, fn_pages, fn_category WHERE fn_news.news_id = fn_pages.news_id AND fn_pages.category_id = fn_category.category_id AND fn_fokus.`fokus_id` = fn_news.`fokus_id` AND fn_category.category_id = '$category_id' GROUP BY fn_fokus.`fokus_id` ORDER BY fn_fokus.fokus_timestamp DESC LIMIT 0,10");
        return $query->result();
    }
    public function getNewsFromFokusWithUrl($fokus_url = null)
    {
        $query = "SELECT fn_news.`news_title`, news_url, news_desc AS descs, news_thumb, news_timestamp, category_alias FROM fn_fokus, fn_news, fn_pages, fn_category WHERE fn_fokus.`fokus_id` = fn_news.`fokus_id` AND fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND fokus_url = '$fokus_url' ORDER BY fn_news.`news_timestamp` DESC";
        return $this->db->query($query)->result();

    }
    public function getIndeph($category_id = null)
    {
        $query = $this->db->query("SELECT
                fn_indeph.`indeph_id`,
                fn_news.news_id,
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
        foreach ($query->result() as $key => $rows) {
            $data = $rows;
        }
        return @$data;
    }
    public function getIndephLeft($category_id, $news_id)
    {
        $query = $this->db->query("SELECT fn_news.`news_url`, news_title FROM fn_pages, fn_news WHERE fn_pages.`news_id` = fn_news.`news_id` AND fn_pages.`category_id` = '$category_id' AND fn_news.news_id != '$news_id' ORDER BY pages_timestamp DESC LIMIT 0,3");
        return $query->result();
    }
    public function getBreakingNews($category_id)
    {
        $query = $this->db->query("SELECT
                fn_news.`news_title`,
                news_url,
                news_desc AS news_desc2,
                category_alias,
                news_thumb,
                fokus_id,
                fn_news.news_id,
                news_timestamp
              FROM
                fn_news_breaking,
                fn_news,
                fn_pages,
                fn_category
              WHERE fn_news_breaking.`news_id` = fn_news.`news_id`
                AND fn_news.`news_id` = fn_pages.`news_id`
                AND fn_category.category_id = '$category_id'
                AND fn_pages.`category_id` = fn_category.`category_id`
                AND date_from <= NOW()
                AND date_to >= NOW()
                AND fn_news_breaking.isActive = TRUE
                ORDER BY breaking_timestamp DESC
                LIMIT 1
                ");
        foreach ($query->result() as $key):
            $data = $key;
        endforeach;
        return @$data;

    }
    public function getBreakingLeft($fokus_id, $news_id)
    {
        $query = $this->db->query("SELECT news_url, news_title FROM fn_fokus, fn_news WHERE fn_fokus.`fokus_id` = fn_news.`fokus_id` AND fn_fokus.fokus_id = '$fokus_id' AND fn_news.`news_id` != '$news_id' ORDER BY news_timestamp DESC LIMIT 0,2");
        return $query->result();
    }
    public function getCommentFromArticle($news_url)
    {
        $query = "SELECT fn_news_comment.`comment_text`, fn_news_comment.`comment_id`, fn_news_comment.`comment_timestamp`, bo_user.`full_name` FROM fn_news_comment, fn_news, bo_user WHERE fn_news_comment.`news_id` = fn_news.`news_id` AND fn_news_comment.`user_id` = bo_user.`id` AND fn_news.news_url = '$news_url' AND fn_news_comment.isActive = true ORDER BY news_timestamp DESC LIMIT 0,100";
        return $this->db->query($query)->result();
    }
    public function insertData($table, $data)
    {
        $sql = $this->db->insert($table, $data);
        if ($sql) {
            # code...
            return true;
        } else {
            return false;
        }
    }
    public function getPopularNewsByFokus()
    {
        $query = $this->db->query('SELECT news_url, news_title, news_desc, news_thumb FROM fn_fokus , fn_news WHERE fn_fokus.`fokus_id` = fn_news.`fokus_id` ORDER BY fn_news.`news_views` DESC LIMIT 0,7');
        foreach ($query->result() as $key => $value) {
            # code...
            $data[] = $value;
        }
        return @$data;
    }
    public function getNewsFromSearch($keyword, $page = 0)
    {
        $query = "SELECT news_timestamp, fn_news.`news_id`, news_thumb, news_url, news_title, news_desc, category_alias FROM fn_news, fn_pages, fn_category WHERE fn_news.`news_id` = fn_pages.`news_id` AND fn_pages.`category_id` = fn_category.`category_id` AND news_desc LIKE '%$keyword%'";
        return $this->db->query($query)->result();

    }
    public function updateData($table, $data, $where, $where_value)
    {
        $this->db->where($where, $where_value);
        $do = $this->db->update($table, $data);
        return $do;
    }

}

/* End of file shop_model.php */
/* Location: ./application/models/shop_model.php */
