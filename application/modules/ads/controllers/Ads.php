<?php
class Ads extends BeritaController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ads_m');
  }
  public function get_leaderboard($kanal = 'home')
  {
    $data = $this->ads_m->get_leaderboard($kanal);
    return $this->load->view('leaderboard_v', $data, true);
  }
  public function get_haa()
  {
    $data = $this->ads_m->get_haa()->row();
    return $this->load->view('haa_v', $data, true);
  }
  public function get_hab()
  {
    $data = $this->ads_m->get_hab()->row();
    return $this->load->view('hab_v', $data, true);
  }
  public function get_kaa($kanal = null)
  {
    $data = $this->ads_m->get_kaa($kanal);
    return $this->load->view('kaa_v', $data, true);
  }
}
 ?>
