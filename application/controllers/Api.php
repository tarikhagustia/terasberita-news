<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  public function getArticle()
  {
    // $article  = array(
    //   array('idh' => 1, 'news' => 'Berita 1'),
    //   array('idh' => 2, 'news' => 'Berita 2'),
    // );
    $judul  = $this->input->get('article_name');
    $this->db->select('news_id, news_title');
    $this->db->from('fn_news');
    $this->db->like('news_title', $judul, '%');
    $this->db->order_by('news_title', 'ASC');
    $get = $this->db->get();
    // var_dump($get->result());
    $article = [];
    foreach ($get->result_array() as $key => $value) {
      $article[$key]['idh'] = $value['news_id'];
      $article[$key]['news'] = $value['news_title'];
    }
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($article));
  }
}
