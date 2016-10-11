<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IslamicPage extends CI_Controller {

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
		$this->load->library('format');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->library('facebook');
	}
	public function index()
	{

		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body');
		$this->load->view('FrontOffice/footer');
	}
	public function terasIslami()
	{
		$aid = 8;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		$dataBreakingNewsLeft = array();
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
		$this->load->view('FrontOffice/terasIslami/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => $dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
}

