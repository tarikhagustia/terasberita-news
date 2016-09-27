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
		$this->load->library('format');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('slim');
		$this->load->model('back');
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
		// var_dump($data);
		$this->load->view('back/index', $page);
	}
	public function creat_new_artikel($do = false)
	{
		$page = array(
			"thepage" => $this->load->view('back/creat_new_artikel', array(), true)
		);
		$this->load->view('back/index', $page);
	}
	public function manage_artikel()
	{
		// $this->load->model('back','modelbackoffice');
		$data = $this->back->contoh($this->session->userdata('id'));
		$page = array(
			"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
		);
		// var_dump($data);
		$this->load->view('back/index', $page);
	}
	public function break_news($do = false)
	{
		$page = array(
			"thepage" => $this->load->view('back/manage_brek_news', array(), true)
		);
		$this->load->view('back/index', $page);
	}
	public function edite($id)
	{
		var_dump($id);
		$this->load->model('back','modelbackoffice');
		$data = $this->modelbackoffice->getDatanews($id, 'news_thumb, news_title, news_desc, user_id, username');
		var_dump($data);
		$this->db->select('fn_pages.category_id');
		$this->db->from('fn_pages');
		$this->db->where('fn_pages.news_id', $id);
		$query = $this->db->get();
		$data1 = $query->result_array();
		
		foreach ($data1 as $row) {
        $data2[] = $row['category_id'];
    	}
    	var_dump($data2);
    	$data3 = json_encode($data2);
    	var_dump($data3);
		$page = array(
			"thepage" => $this->load->view('back/edite_news', array('data' => $data, 'data3' => $data3), true)
		);
		
		$this->load->view('back/index', $page);
	}
	public function inputData(){
		$images = Slim::getImages();
		
        // var_dump($_POST);
        if ($images == false) {
            // inject your own auto crop or fallback script here

            show_404();
        } else {
            foreach ($images as $image) {
                $file = Slim::saveFile($image['output']['data'], $image['input']['name']);
            }
            $news_url       = $this->format->seoUrl($this->input->post('jdl-berita'));
            $jdl_berita     = $this->input->post('jdl-berita');
            $id     		= $this->session->userdata('id');
            $name_pen       = $this->input->post('name-pen');
            $select2	    = $this->input->post('select2');
            $isi            = $this->input->post('isi');
            $news_thumb     = $file['path'];
            $insert1        = array(

            'news_url'       => $news_url,
            'news_title'     => $jdl_berita,
            'user_id'     	 => $id,
            'news_desc'      => $isi,
            'news_thumb'     => $news_thumb,
            );
            $sql = $this->back->insertData('fn_news', $insert1);
            $idta = $this->db->insert_id(); // Will return the last insert id.
            $result = array();
		    foreach($select2 AS $key => $val){
		     $result[] = array(
		      "category_id"  => $_POST['select2'][$key],
		      "news_id"  => $idta
		     );
		    }
		     
		     $sql2 = $this->db->insert_batch('fn_pages', $result); // fungsi dari codeigniter untuk menyimpan multi array  
            if ($sql) {
                redirect('backoffice/index','refresh');
            } else {
                show_404();
            }
            // var_dump($result);
            // var_dump($idta);
                // echo '<img src="' . base_url() . $file['path'] . '" alt=""/>';
        }
	}
	public function update()
	{
		$this->back->updataData();
		$page = array(
			"thepage" => $this->load->view('back/manage_brek_news', array(), true)
		);
		$this->load->view('back/index', $page);
	}

}
