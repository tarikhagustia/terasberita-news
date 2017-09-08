<?php
class Templates extends FrontEndController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('user_agent');
  }
  public function get_news_templates($data = null)
  {
    $this->load->view('global', $data);
  }
}
