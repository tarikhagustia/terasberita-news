<?php
class Berita extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_m');
    $this->load->library('format');
  }
  public function get_feed($kanal_name)
  {
    // $kanal_name = 1;
    // return $this->berita_m->get_feed($kanal_name);
  }
  public function get_feeds()
  {
    $kanal_name = 'teras-nasional';
    $data['list'] = $this->berita_m->get_feed($kanal_name);
    // var_dump($data['list']);
    return $this->load->view('feeds_v', $data , true);
  }
  public function get_breaking()
  {
    return $this->load->view('breaking_v', [] , true);
  }
  public function get_breaking_terkait()
  {
    return $this->load->view('breaking_terkait_v', [] , true);
  }
  public function get_tkp()
  {
    return $this->load->view('tkp_v', [] , true);
  }
  public function get_peristiwa()
  {
    return $this->load->view('peristiwa_v', [] , true);
  }
  public function get_popular()
  {
    return $this->load->view('popular_v', [] , true);
  }
}
 ?>
