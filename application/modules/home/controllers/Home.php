<?php
class Home extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data['content'] = 'home/home_v';
    $data['utama'] = [];
    $data['feed'] = $this->berita->get_feed(1);
    $data['tkp'] = [];
    $data['popular'] = [];
    $this->templates->get_news_templates($data);
  }
}
