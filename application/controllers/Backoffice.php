<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if (!$this->session->userdata('logged_in')) {

			$this->session->set_flashdata('flashSuccess', 'You are not login, Please login first');
			// echo $this->session->flashdata('flashSuccess');
			redirect('auth/index','refresh');
		}
	}
	public function index()
	{
		$page_session = $this->session->userdata('page');
		if (empty($page_session)) {
			$this->session->set_userdata(array('page' => 'dashboard'));
		}
		switch ($page_session) {
			case 'dashboard':
				$page = "dashboard";
				$data = '';
				break;
			case 'manage_user':
				$this->load->model('back','modelbackoffice');
				$this->session->set_userdata(array('page' => 'manage_user'));
				$data = $this->modelbackoffice->getData('bo_user', 'username, full_name, date_create, email');
				$page = "manage_user";
				break;
			default:
				$data = '';
				$page = "dashboard";
				break;
		}
		// var_dump($_SESSION);
		$part = array('thepage' => $this->load->view('back/'.$page,array('data' => $data),true));
		$this->load->view('back/index', $part);
	}
	public function dashboard()
	{
		$page = array(
			"thepage" => $this->load->view('back/dashboard', array(), true)
		);
		$this->load->view('back/index', $page);
	}
	public function dashboard2()
	{		
		$page = array(
			"thepage" => $this->load->view('back/dashboard2', array(), true)
		);
		$this->load->view('back/index', $page);
	}
	public function logout()
	{
		$this->session->sess_destroy();
    	redirect('auth/index');
	}
	public function manage_user($do = false)
	{
		$this->load->model('back','modelbackoffice');
		$data = $this->modelbackoffice->getData('bo_user', 'username, full_name, date_create, email');
		$page = array(
			"thepage" => $this->load->view('back/manage_user', array('data' => $data), true)
		);
		$this->load->view('back/index', $page);
	}

}
