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
    $data['utama'] = [];
    $data['feed'] = $this->berita->get_feed(1);
    $data['tkp'] = [];
    $data['popular'] = [];
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    $this->templates->get_news_templates($data);
  }
}
?>
