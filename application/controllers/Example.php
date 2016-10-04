<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->model('news');
		$this->load->library('facebook');
		$this->load->helper('url');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
		// $this->load->view('examples/start');

		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/test', array());
		$this->load->view('FrontOffice/footer');
	}

	// ------------------------------------------------------------------------

	/**
	 * Web redirect login example page
	 */
	public function web_login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}

		}

		// display view
		$this->load->view('examples/web', $data);
	}

	// ------------------------------------------------------------------------

	/**
	 * JS SDK login example
	 */
	public function js_login()
	{
		// Load view
		$this->load->view('examples/js');
	}

	// ------------------------------------------------------------------------

	/**
	 * AJAX request method for positing to facebook feed
	 */
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	// ------------------------------------------------------------------------

	/**
	 * Logout for web redirect example
	 *
	 * @return  [type]  [description]
	 */
	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('example/web_login', redirect);
	}
	function sendmail()
	{
	    $this->load->library('email'); // load email library
	    $this->email->from('user@gmail.com', 'sender name');
	    $this->email->to('agustia.tarikh150@gmail.com');
	    $this->email->cc('tarikhagustians@gmail.com');
	    $this->email->subject('Your Subject');
	    $this->email->message('Your Message hehe hehehehe ehhehe ehehhe hehehe hehhe');
	    $this->email->send(FALSE);
		print_r($this->email->print_debugger(array('headers')));
	}
}
