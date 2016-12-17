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
    if($data['article'] == null):
      show_404();
    endif;
    $popup = $this->db->get_where('fn_ads_popup', array('news_id' => $data['article']->news_id));
    $popups = false;
    foreach ($popup->result() as $key => $value) {
      $popups = $value;
    }
    $data['popups'] = $popups;
    $this->templates->get_news_templates($data);
  }
}
?>
