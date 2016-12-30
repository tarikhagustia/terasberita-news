<?php
class Old extends BeritaController
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('news');
		$this->load->library('format');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->library('facebook');
	}
  public function index()
  {
    
  }
}
