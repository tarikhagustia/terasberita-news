<?php
class Artikel extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('article_m');
  }
  public function view_detail($news_url)
  {
    set_config('meta_article', true);
    set_config('meta_article_url', $news_url);
    $data['content'] = 'artikel/artikel_v';
    $data['article'] = $this->article_m->get_article($news_url);
    $this->templates->get_news_templates($data);
  }
}
?>
