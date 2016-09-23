<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	public function index()
	{
		$this->load->library('session');
		// echo md5($this->config->item('encryption_key') . "1234");
		// echo $this->config->item('encryption_key');
		$this->load->view('back/login');
	}
	public function checkLogin()
	{
		$this->load->library('session');
		$this->load->model('mymodel');
		$this->load->library('form_validation');
		// Validator
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_verfiyUser');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('back/login');
		}
		else
		{
			$data = $this->mymodel->modelLoginSession($this->input->post('username'));
			$this->session->set_userdata($data);
			redirect('backoffice/index','refresh');
		}


	}
	public function verfiyUser()
	{
		$username = $this->input->post('username');
		$password = md5($this->config->item('encryption_key') . $this->input->post('password'));
		if ($this->mymodel->modelLogin('bo_user',array('username' => $username, 'password' => $password))) {
			return true;
		}else{
			$this->form_validation->set_message('verfiyUser', 'Incorrect Username and password combination, please try again');
			return false;
		}
		// $username = $this->input->post('username');
		// $password = $this->input->post('password');
		// print_r ($this->mymodel->getNumRows('bo_user',array('username' => $username, 'password' => $password)));
		// // print_r($_POST);
		// // echo $this->mymodel->testaja();
		// // var_dump($hasil);
	}
	public function facebook(){
		$this->load->library('session');
		$this->load->library('facebook');
		$login_url = $this->facebook->login_url();
		print_r($login_url);
	}
	public function facebook2(){
		$this->load->library('session');
		$this->load->library('facebook');
		$login_url = $this->facebook->get_session();
		var_dump($login_url);
	}
}
