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
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => $dataBreakingNewsLeft));
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
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
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
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
		$this->load->view('FrontOffice/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => @$dataBreakingNewsLeft));
		$this->load->view('FrontOffice/footer');
	}
	public function terasKriminal(){
		$aid = 4;
		$dataNews = $this->news->getNewsFromPage($aid);
		$dataPopularOne = $this->news->getPopularNewsByCatgoryOnlyOne($aid);
		@$dataPopular = $this->news->getPopularNewsByCatgory($aid, $dataPopularOne->news_id);
		$dataIndeph = $this->news->getIndeph($aid);
		if(!empty($dataIndeph)):
			$dataIndephLeft = $this->news->getIndephLeft($dataIndeph->category_id, $dataIndeph->news_id);
		endif;
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($aid);
		$dataBreakingNews = $this->news->getBreakingNews($aid);
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
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
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
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
		$dataLogo = $this->news->getData('fn_category', 'logo' , array('category_id' => $aid));
		foreach ($dataLogo as $key => $value) {
			# code...
			$dataLogo = $value;
		}
		$this->load->view('FrontOffice/topside', array('dataLogo' => $dataLogo));
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
		$dataPopular = $this->news->getPopularNewsByFokus();
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/fokus', array('dataFokus' => $dataFokus, 'dataPopular' => $dataPopular));
		$this->load->view('FrontOffice/footer');
	}
	public function mainteance(){
		$this->load->view('CountDown/index');
	}
	public function viewMyArticle($news_url = null){

		$dataArticle = $this->news->getNewsFromArticle($news_url);
		if(empty($dataArticle)):
			redirect(base_url());
		endif;
		$dataCommentArticle = $this->news->getCommentFromArticle($news_url);
		$dataPopular = $this->news->getPopularNewsByCatgory($dataArticle->category_id, $dataArticle->news_id);
		$dataTerasPeristiwa = $this->news->getTerasPeristiwa($dataArticle->category_id);
		$this->load->view('FrontOffice/topside', array('title' => $dataArticle->news_title, 'dataArticle' => $dataArticle));
		$this->load->view('FrontOffice/article', array('dataArticle' => $dataArticle, 'dataCommentArticle' => $dataCommentArticle, 'dataPopuler' => $dataPopular, 'dataTerasPeristiwa' => $dataTerasPeristiwa));
		$this->load->view('FrontOffice/footer');
		$cekId = $this->news->getData('fn_news', 'news_id', array('news_url' => $news_url));
		foreach ($cekId as $key => $value) {
			$news_id = $value->news_id;
		}
		$seens_ip = $_SERVER['REMOTE_ADDR'];
		$cekIp = $this->news->getData('fn_news_seens', 'seens_id', array('news_id' => $news_id, 'seens_ip' => $seens_ip));
		// Jika blum ada yang liat maka insert
		if (empty($cekIp)) {
			if($this->session->userdata('logged_in')):
				$isLogin = true;
			else:
				$isLogin = false;
			endif;
			$data = array(
				'news_id' => $news_id,
				'seens_ip' => $seens_ip,
				'seens_comment' => 'Already seens on ip '.$seens_ip,
				'isLogin' => $isLogin
			);
			$this->news->insertData('fn_news_seens', $data);
		}
	}

	public function setComment(){
		$data = array(
			'comment_text' => $this->security->xss_clean($this->input->post('comment_text')),
			'news_id' => $this->encrypt->decode($this->input->post('crypt_news_id')),
			'user_id' => $this->session->userdata('id'),
			'isActive' => false
		);
		$query = $this->news->insertData('fn_news_comment', $data);
		if($query):
			 $links = $this->news->getData('fn_news', 'news_url', $where = array('news_id' => $this->encrypt->decode($this->input->post('crypt_news_id'))));
				$link = "";
			 foreach ($links as $key => $value) {
			 	# code...
			 	$link = $value->news_url;
			 }
			 $this->session->set_flashdata('comment_status', 'komentar anda akan melalui proses moderasi');
			 redirect(base_url($link));
		else:
			$links = $this->news->getData('fn_news', 'news_url', $where = array('news_id' => $this->encrypt->decode($this->input->post('crypt_news_id'))));
				$link = "";
			 foreach ($links as $key => $value) {
			 	# code...
			 	$link = $value->news_url;
			 }
			$this->session->set_flashdata('comment_status', 'komentar anda gagal kami simpan');
		endif;
	}
	public function secureSearch(){
		$keyword = $this->security->xss_clean($this->input->get('q'));
		$page = $this->input->get('page');
		$dataSearch = $this->news->getNewsFromSearch($keyword); //GROUP BY fn_news.`news_id`
		if($keyword == "" || $keyword == null): $dataSearch = array(); endif;
		$dataPopular = $this->news->getPopularNewsByFokus();
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/secureSearch', array('dataSearch' => $dataSearch, 'dataPopular' => $dataPopular));
		$this->load->view('FrontOffice/footer');
	}
	public function customOnly()
	{
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
		$dataBreakingNewsLeft = array();
		if(!empty($dataBreakingNews)):
			$dataBreakingNewsLeft = $this->news->getBreakingLeft($dataBreakingNews->fokus_id, $dataBreakingNews->news_id);
		endif;
		$this->load->view('custom/topside');
		$this->load->view('custom/body', array('dataNews' => $dataNews, 'dataPopular' => $dataPopular, 'dataPopularOne' => $dataPopularOne, 'dataTerasPeristiwa' => $dataTerasPeristiwa, 'dataIndeph' => $dataIndeph, 'dataIndephLeft' => @$dataIndephLeft, 'dataBreakingNews' => $dataBreakingNews, 'dataBreakingNewsLeft' => $dataBreakingNewsLeft));
		$this->load->view('custom/footer');
	}
	public function fokus()
	{
		$query = $this->db->query('SELECT fn_fokus.`fokus_name`, fokus_url, fn_fokus.`fokus_id`, news_title, news_url, news_timestamp FROM fn_fokus, fn_news WHERE fn_news.`fokus_id` = fn_fokus.`fokus_id`ORDER BY fn_news.`news_timestamp` DESC ')->result();
		foreach($query as $key => $rows):
			$data[$rows->fokus_name][] = $rows;
		endforeach;

		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/fokus_mobile', array('dataFokus' => $data));
		$this->load->view('FrontOffice/footer');
	}
	public function populer($kanal = null)
	{
		$this->db->select('news_url, news_title, news_timestamp, news_thumb');
		$this->db->from('fn_news');
		$this->db->join('fn_pages', 'fn_news.news_id = fn_pages.news_id', 'left');
		$this->db->join('fn_category', 'fn_pages.category_id = fn_category.category_id', 'left');
		if($kanal != null):
			$this->db->where('fn_category.category_name', $kanal);
		endif;
		$this->db->group_by('fn_news.news_id');
		$this->db->order_by('news_views', 'DESC');
		$this->db->limit('20');
		$get = $this->db->get()->result();
		// Get last News
		$this->db->select('news_timestamp');
		$this->db->from('fn_news');
		$this->db->order_by('news_timestamp', 'DESC');
		$this->db->limit(1);
		$data = $this->db->get()->result();

		// Get Kanals
		$this->db->select('category_name, category_alias');
		$this->db->from('fn_category');
		$this->db->where('category_id !=', 7);
		$this->db->order_by('category_alias', 'ASC');
		$kanals = $this->db->get()->result();

		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/populer_mobile', array('dataNews' => $get, 'dataLast' => $data, 'kanals' => $kanals));
		$this->load->view('FrontOffice/footer');
	}
	public function indeks_mobile($keyword = null)
	{

		$tglnya = $this->input->get('tgl');
		$bln = $this->input->get('bln');
		$thn = $this->input->get('thn');

		// get tanggal
		for ($i=1; $i <= 31 ; $i++) { 
			# code...
			$hitung = strlen($i);
			if($hitung < 2):
				$i = '0'.$i;
			endif;
			$tgl[] = $i;
		}
		// Get Bulan
		$bulan  = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november','desember'];

		$tahun = [date('Y', time())];
		$tanggal = [
			'tanggal' => $tgl,
			'bulan' => $bulan,
			'tahun' => $tahun
		];
		// Get berita terbaru
		$this->db->select('news_url, news_title, news_thumb, news_timestamp');
		$this->db->from('fn_news');

		if($keyword != null):
			$this->db->where('LEFT(news_timestamp,10)', $thn.'-'.$bln.'-'.$tglnya);
		endif;


		$this->db->order_by('news_timestamp', 'DESC');
		$this->db->limit(10);
		$dataNews = $this->db->get()->result();
		$this->load->view('FrontOffice/topside');
		$this->load->view('FrontOffice/indeks_mobile', array('dataTanggal' => $tanggal, 'dataNews' => $dataNews));
		$this->load->view('FrontOffice/footer');	
	}
}
