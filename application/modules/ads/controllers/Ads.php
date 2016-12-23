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
}
 ?>
