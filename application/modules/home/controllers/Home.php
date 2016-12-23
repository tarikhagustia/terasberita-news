<?php
class Home extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('home_m');
  }
  public function index()
  {
    $data['content'] = 'home/home_v';
    $data['utama'] = [];
    $data['feed'] = $this->berita->get_feed(1);
    $data['penelusuran_img'] = $this->home_m->penelusuran_img();
    $this->templates->get_news_templates($data);
  }
}
