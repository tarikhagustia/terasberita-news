<?php
class Search extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data['content'] = 'search/search_v';
    $data['article'] = [];
    $this->templates->get_news_templates($data);
  }
}
 ?>
