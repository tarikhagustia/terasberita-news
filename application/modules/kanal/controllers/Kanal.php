<?php
class Kanal extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
  }
  public function show_kanal($kanal = null)
  {
    $data['content'] = 'kanal/kanal_v';
    $data['kanal'] = $kanal;
    $data['feed'] = $this->berita->get_feed(1);
    $this->templates->get_news_templates($data);
  }
}
?>
