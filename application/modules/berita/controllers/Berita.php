<?php
class Berita extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_m');
  }
  public function get_feed($kanal_name)
  {
    $kanal_name = 1;
    return $this->berita_m->get_feed($kanal_name);
  }
}
 ?>
