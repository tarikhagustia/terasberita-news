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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news');
		// $this->load->config('email');
	}
	public function index()
	{
		$this->load->library('session');
		$this->load->model('news');
		// echo md5($this->config->item('encryption_key') . "1234");
		// echo $this->config->item('encryption_key');
		$this->load->view('back/login');
	}
	public function checkLogin($redirect = null)
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
			if($redirect == null):
				redirect('backoffice/index');
			else:
				redirect($redirect);
			endif;
		}


	}
	public function checkLoginUsers($redirect = null)
	{
		$this->load->library('session');
		$this->load->model('mymodel');
		$this->load->library('form_validation');
		// Validator
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[bo_user.email]');
		$this->form_validation->set_rules('full_name', 'Nama Anda', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
		

		if ($this->form_validation->run() == FALSE)
		{
			$resonse['valid'] = false;
			$resonse['valid_msg'] = validation_errors();
			$resonse['msg'] = '';
			$this->output
		         ->set_content_type('application/json')
		         ->set_output(json_encode($resonse));
		    // exit;
		}
		else
		{
			$data = array(
				'username' => $this->input->post('email'),
				'email' => $this->input->post('email'),
				'full_name' => $this->input->post('full_name'),
				'password' => md5($this->config->item('encryption_key').$this->input->post('password')),
				'group_id' => 3
			);
			$insert = $this->news->insertData('bo_user', $data);	
			$resonse['valid'] = true;
			$resonse['msg'] = 'Anda berhasil melakukan registrasi, selamat datang :)';
			$this->output
		         ->set_content_type('application/json')
		         ->set_output(json_encode($resonse));
		    // exit;
		}


	}
	public function checkLoginAjax($redirect = null)
	{
		$this->load->library('session');
		$this->load->model('mymodel');
		$this->load->library('form_validation');
		// Validator
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_verfiyUser');

		if ($this->form_validation->run() == FALSE)
		{
			$resonse['valid'] = false;
			$resonse['valid_msg'] = validation_errors();
			$resonse['msg'] = '';
			$this->output
		         ->set_content_type('application/json')
		         ->set_output(json_encode($resonse));
		    // exit;
		}
		else
		{
			$data = $this->mymodel->modelLoginSession($this->input->post('username'));
			$this->session->set_userdata($data);
			$resonse['valid'] = true;
			$resonse['msg'] = 'Anda berhasil masuk, selamat datang :)';
			$this->output
		         ->set_content_type('application/json')
		         ->set_output(json_encode($resonse));
		    // exit;
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
	public function logout()
	{
		$redirect = $this->input->get('redirect');
		$this->session->sess_destroy();
		if(isset($resonse)):
    		redirect(base_url());
    	else:
    		redirect(urldecode($redirect));
    	endif;
	}
}
