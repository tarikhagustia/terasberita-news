<?php
class BeritaController extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->module('templates');
    $this->load->module('berita');
  }
}
 ?>
