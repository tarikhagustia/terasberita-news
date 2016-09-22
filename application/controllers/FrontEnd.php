<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller {

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
	}
	public function index()
	{

		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body');
		$this->load->view('FrontOffice/footer');
	}
	public function terasNasional(){
		$aid = 2;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasSukabumi(){
		$aid = 1;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasCianjur(){
		$aid = 3;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasKriminal(){
		$aid = 4;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasEkonomi(){
		$aid = 5;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasSehat(){
		$aid = 6;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasPeristiwa($fokus_url = null){
		$dataFokus = $this->news->getNewsFromFokusWithUrl($fokus_url);
		if (empty($dataFokus)) {
			# code...
			show_404();
			exit;
		}
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/fokus', array('dataFokus' => $dataFokus));
		$this->load->view('FrontOffice/footer');
	}
	public function mainteance(){
		$this->load->view('CountDown/index');
	}
	public function viewMyArticle($news_url = null){

		$dataArticle = $this->news->getNewsFromArticle($news_url);
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/article', array('dataArticle' => $dataArticle));
		$this->load->view('FrontOffice/footer');
	}

}
