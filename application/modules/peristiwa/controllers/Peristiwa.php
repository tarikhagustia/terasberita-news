<?php
class Peristiwa extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('peristiwa_m');
  }
  public function index($peristiwa)
  {
    $data['content'] = 'peristiwa/peristiwa_v';
    $data['berita'] = $this->peristiwa_m->get($peristiwa);
    if(empty($data['berita'])):
      show_404();
    endif;
    $data['p_title'] = $this->peristiwa_m->title($peristiwa)->fokus_name;
    $this->templates->get_news_templates($data);
  }
}
