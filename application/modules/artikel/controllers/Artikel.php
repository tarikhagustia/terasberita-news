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
    $this->set_viewer($news_url);
    $this->templates->get_news_templates($data);

  }
  public function set_viewer($news_url)
  {
    $this->db->select('news_id')->from('fn_news')
    ->where('news_url', $news_url);
    $news_id = $this->db->get()->row()->news_id;
    $seens_ip = $_SERVER['REMOTE_ADDR'];

    $this->db->select('seens_id')->from('fn_news_seens')
    ->where('news_id', $news_id)
    ->where('seens_ip', $seens_ip);
    $cekIp = $this->db->get()->result();
  		// Jika blum ada yang liat maka insert
		if (empty($cekIp)) {
			if($this->session->userdata('logged_in')):
				$isLogin = true;
			else:
				$isLogin = false;
			endif;
			$data = array(
				'news_id' => $news_id,
				'seens_ip' => $seens_ip,
				'seens_comment' => 'Already seens on ip '.$seens_ip,
				'isLogin' => $isLogin
			);
			$this->db->insert('fn_news_seens', $data);
    }
  }
}
