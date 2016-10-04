<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backoffice extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->library('format');
        $this->load->model('news');
        $this->load->library('slim');
        $this->load->model('back');
        if (!$this->session->userdata('logged_in')) {
			     $this->session->set_flashdata('flashSuccess', 'You are not login, Please login first');
			     redirect('auth/index','refresh');
		    }
        if ($this->session->userdata('group_id') == 3) {
           $this->session->set_flashdata('flashSuccess', 'You dont have any access to this page');
           redirect('auth/index','refresh');
        }
        date_default_timezone_set('Asia/Jakarta');
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
    $this->load->model('back', 'modelbackoffice');
    $data = $this->modelbackoffice->getData('bo_user', 'id, username, full_name, date_create, email');
    $dataGroup = $this->modelbackoffice->getData('bo_group', 'group_id, group_alias');
    $page = array(
        "thepage" => $this->load->view('back/manage_user', array('data' => $data, 'dataGroup' => $dataGroup), true),
    );
    // var_dump($data);
    $this->load->view('back/index', $page);
	}
	public function creat_new_artikel($do = false)
	{
		$dataPages = $this->news->getData('fn_category', 'category_id, category_alias', $where = array(1 => 1));
		$page = array(
			"thepage" => $this->load->view('back/creat_new_artikel', array('dataPages' => $dataPages), true)
		);
		$this->load->view('back/index', $page);
	}
	public function manage_artikel()
	{
    $data = $this->back->contoh($this->session->userdata('id'));
		$page = array(
			"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
		);
		// var_dump($data);
		$this->load->view('back/index', $page);
	}
	public function break_news($id)
	{
		$page = array(
			"thepage" => $this->load->view('back/manage_brek_news', array('id' => $id), true)
		);
		$this->load->view('back/index', $page);
	}
	public function manage_comment()
	{
		$query  = $this->db->query('SELECT fn_news_comment.`comment_id`, full_name, comment_text, news_title, comment_timestamp FROM fn_news_comment, fn_news, bo_user WHERE fn_news_comment.`news_id` = fn_news.`news_id` AND fn_news_comment.`user_id` = bo_user.`id` AND fn_news_comment.`isActive` = FALSE ORDER BY fn_news_comment.`comment_timestamp` DESC LIMIT 20');
		$dataComment = $query->result();
		$page = array(
			"thepage" => $this->load->view('back/manage_comment', array('dataComment' => $dataComment), true)
		);
		$this->load->view('back/index', $page);
	}
	public function delete($jenis, $id)
  {
       if ($jenis == 'komentar') {
           $this->db->delete('fn_news_comment', array('comment_id' => $id));
           redirect('backoffice/manage_comment');
       } elseif ($jenis == 'indeph') {
           $this->db->delete('fn_indeph', array('indeph_id' => $id));
           $this->session->set_flashdata('status', 'Sukses delete data');
           redirect('backoffice/manage_indeph');
       } elseif ($jenis == 'user') {
           $this->db->delete('bo_user', array('id' => $id));
           $this->session->set_flashdata('status', 'Sukses delete data');
           redirect('backoffice/manage_user');
       }
	}
	public function approve_comment($comment_id)
  {
		$this->news->updateData('fn_news_comment', array('isActive' => true), 'comment_id', $comment_id);
		redirect('backoffice/manage_comment');
	}
  public function edite($id)
	{
		// var_dump($id);
		$this->load->model('back','modelbackoffice');
		$data = $this->modelbackoffice->getDatanews($id, 'news_thumb, news_title, news_desc, user_id, news_creator, username');
		// var_dump($data);
		$this->db->select('fn_pages.category_id');
		$this->db->from('fn_pages');
		$this->db->where('fn_pages.news_id', $id);
		$query = $this->db->get();
		$data1 = $query->result_array();
    $dataCategory = $this->news->getData('fn_category', 'category_id, category_alias');
		foreach ($data1 as $row) {
        $data2[] = $row['category_id'];
    	}
    	// var_dump($data2);
    	$data3 = json_encode($data2);
    	// var_dump($data3);
    $datas = array(
      'data' => $data,
      'data3' => $data3,
      'id' => $id,
      'categorys' => $dataCategory
    );
		$page = array(
			"thepage" => $this->load->view('back/edite_news', $datas, true)
		);
       $this->load->view('back/index', $page);

    }
    public function inputData()
    {
        $images = Slim::getImages();

        // var_dump($_POST);
        if ($images == false) {
            // inject your own auto crop or fallback script here

            show_404();
        } else {
            foreach ($images as $image) {
                $file = Slim::saveFile($image['output']['data'], $this->format->url_dash($image['input']['name']));
            }
            $news_url   = $this->format->seoUrl($this->input->post('jdl-berita'));
            $jdl_berita = $this->input->post('jdl-berita');
            $id         = $this->session->userdata('id');
            $name_pen   = $this->input->post('name-pen');
            $select2    = $this->input->post('select2');
            $isi        = $this->input->post('isi');
            $news_thumb = $file['path'];
            $insert1    = array(
                'news_url'   => $news_url,
                'news_title' => $jdl_berita,
                'news_creator' => $name_pen,
                'user_id'    => $id,
                'news_timestamp' => date('Y-m-d H:i'),
                'news_desc'  => $isi,
                'news_thumb' => $news_thumb,
            );
            $sql    = $this->back->insertData('fn_news', $insert1);
            $idta   = $this->db->insert_id(); // Will return the last insert id.
            $result = array();
            foreach ($select2 as $key => $val) {
                $result[] = array(
                    "category_id" => $_POST['select2'][$key],
                    "news_id"     => $idta,
                );
            }
            $sql2 = $this->db->insert_batch('fn_pages', $result); // fungsi dari codeigniter untuk menyimpan multi array
            if ($sql) {
                redirect('backoffice/manage_artikel');
                // var_dump($insert1);
            } else {
                show_404();
            }
            // var_dump($result);
            // var_dump($idta);
            // echo '<img src="' . base_url() . $file['path'] . '" alt=""/>';
        }
    }
	// public function managenews()
	// {
	// 	// var_dump($_POST);
	// 	$images = Slim::getImages();
  //       if ($images == false) {
  //           show_404();
  //       } else {
  //           foreach ($images as $image) {
  //               $file = Slim::saveFile($image['output']['data'], $image['input']['name']);
  //           }
  //           $news_url       = $this->format->seoUrl($this->input->post('jdl-berita'));
  //           $jdl_berita     = $this->input->post('jdl-berita');
  //           $id     		= $this->session->userdata('id');
  //           $idnya     		= $this->input->post('idnya');
  //           $tombol     	= $this->input->post('tombol');
  //           $name_pen       = $this->input->post('name-pen');
  //           $name_red       = $this->input->post('name-red');
  //           $select2	    = $this->input->post('select2');
  //           $isi            = $this->input->post('isi');
  //           $news_thumb     = $file['path'];
  //           $data        = array(
  //
  //           'news_url'       => $news_url,
  //           'news_title'     => $jdl_berita,
  //           'news_creator'   => $name_red,
  //           'news_desc'      => $isi,
  //           'news_thumb'     => $news_thumb,
  //           );
  //           $where        = array(
  //
  //           'news_id'       => $idnya,
  //           );
  //           if ($tombol == 'Edit'){
  //           	$sqlok = $this->back->updataData($where, $data, 'fn_news');
  //           } else if ($tombol == 'Delet'){
  //           	$sql = $this->back->deleteData($where, 'fn_news');
  //           } else {
  //           	$data = $this->back->contoh($this->session->userdata('id'));
	// 			$page = array(
	// 				"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
	// 			);
	// 			// var_dump($data);
	// 			$this->load->view('back/index', $page);
  //           }
  //           // var_dump($result);
  //           // var_dump($idta);
  //           // echo '<img src="' . base_url() . $file['path'] . '" alt=""/>';
  //       }
  //   }
  //
  //   public function update()
  //   {
  //       echo "Ok deal ";
  //   }
    public function manage_indeph()
    {
        $query = $this->db->query('SELECT
					  indeph_id,
					  fn_news.news_id,
					  news_title,
					  news_url,
					  date_from,
					  date_to
					FROM
					  fn_indeph,
					  fn_news
					WHERE fn_indeph.`news_id` = fn_news.`news_id`
					  AND date_from <= NOW()
					  AND date_to >= NOW()
					 ORDER BY fn_indeph.`indeph_timestamp` DESC LIMIT 20');
        $dataIndeph = $query->result();
        $query      = $this->db->query('SELECT news_id, news_title FROM fn_news ORDER BY news_title ASC');
        $dataNews   = $query->result();
        $page       = array(
            "thepage" => $this->load->view('back/manage_indeph', array('dataIndeph' => $dataIndeph, 'dataNews' => $dataNews), true),
        );
        $this->load->view('back/index', $page);
    }
    public function insert($type = null)
    {
        if ($type == 'indeph') {
            # code...
            $pecah = $this->format->date_periode($this->input->post('tanggal'));
            $data  = array(
                'news_id'   => $this->input->post('news'),
                'date_from' => $pecah['date_from'],
                'date_to'   => $pecah['date_to'],
            );
            $this->news->insertData('fn_indeph', $data);
            $this->session->set_flashdata('status', 'Berhasil diinput');
            redirect('backoffice/manage_indeph');
            if ($tombol == 'Edit'){
            	$sql = $this->back->deleteData($where, 'fn_pages');
            	$result = array();
			    foreach($select2 AS $key => $val){
			    $result[] = array(
			      "category_id"  => $_POST['select2'][$key],
			      "news_id"  => $idnya
			     );
			    }
			     $sql2 = $this->db->insert_batch('fn_pages', $result); // fungsi dari codeigniter untuk menyimpan multi array
            } else if ($tombol == 'Delet'){
            	$sql = $this->back->deleteData($where, 'fn_pages');
            } else {
            	$data = $this->back->contoh($this->session->userdata('id'));
				$page = array(
					"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
				);
				// var_dump($data);
				$this->load->view('back/index', $page);
            }



                $data = $this->back->contoh($this->session->userdata('id'));
				$page = array(
					"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
				);
				// var_dump($data);
				$this->load->view('back/index', $page);



        }
	}
  public function managenews()
	{
		// var_dump($_POST);
		$images = Slim::getImages();
        if ($images == false) {
            show_404();
        } else {
            foreach ($images as $image) {
                $file = Slim::saveFile($image['output']['data'], $this->format->url_dash($image['input']['name']));
            }
            $news_url       = $this->format->seoUrl($this->input->post('jdl-berita'));
            $jdl_berita     = $this->input->post('jdl-berita');
            $id     		= $this->session->userdata('id');
            $idnya     		= $this->input->post('idnya');
            $tombol     	= $this->input->post('tombol');
            $name_pen       = $this->input->post('name-pen');
            $name_red       = $this->input->post('name-red');
            $select2	    = $this->input->post('select2');
            $isi            = $this->input->post('isi');
            $news_thumb     = $file['path'];
            $data        = array(

            'news_url'       => $news_url,
            'news_title'     => $jdl_berita,
            'news_creator'   => $name_red,
            'news_desc'      => $isi,
            'news_thumb'     => $news_thumb,
            );
            $where        = array(

            'news_id'       => $idnya,
            );
            if ($tombol == 'Edit'){
            	$sqlok = $this->back->updataData($where, $data, 'fn_news');
            } else if ($tombol == 'Delet'){
            	$sql = $this->back->deleteData($where, 'fn_news');
            } else {
            	$data = $this->back->contoh($this->session->userdata('id'));
				$page = array(
					"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
				);
				// var_dump($data);
				$this->load->view('back/index', $page);
            }

            if ($tombol == 'Edit'){
            	$sql = $this->back->deleteData($where, 'fn_pages');
            	$result = array();
			    foreach($select2 AS $key => $val){
			    $result[] = array(
			      "category_id"  => $_POST['select2'][$key],
			      "news_id"  => $idnya
			     );
			    }
			     $sql2 = $this->db->insert_batch('fn_pages', $result); // fungsi dari codeigniter untuk menyimpan multi array
            } else if ($tombol == 'Delet'){
            	$sql = $this->back->deleteData($where, 'fn_pages');
            } else {
            	$data = $this->back->contoh($this->session->userdata('id'));
				$page = array(
					"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
				);
				// var_dump($data);
				$this->load->view('back/index', $page);
            }



                $data = $this->back->contoh($this->session->userdata('id'));
				$page = array(
					"thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
				);
				// var_dump($data);
				$this->load->view('back/index', $page);



        }
	}
	public function brek()
	{
        $pecah = $this->format->date_periode($this->input->post('tanggal'));
        $data1  = array(
            'news_id'   => $this->input->post('idnews'),
            'date_from' => $pecah['date_from'],
            'date_to'   => $pecah['date_to'],
            'isActive'  => $this->input->post('active'),
        );
        $sql = $this->back->insertBrek('fn_news_breaking', $data1);
		    if($sql):
          redirect('backoffice/manage_artikel');
        else:
          redirect('backoffice/index');
        endif;
    }
    public function createUsers()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        // Validator
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[bo_user.email]');
        $this->form_validation->set_rules('full_name', 'Nama Anda', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
        	$this->session->set_flashdata('error',validation_errors());
            redirect('backoffice/manage_user');
            // var_dump(validation_errors());
        }else{
        	$this->session->set_flashdata('status','Penambahan user berhasil');
        	$data = array(
        		'username' => $this->input->post('email'),
        		'full_name' => $this->security->xss_clean($this->input->post('full_name')),
        		'email' => $this->input->post('email'),
        		'password' => md5($this->config->item('encryption_key').$this->input->post('password')),
        		'group_id' => $this->input->post('akses')
        	);
        	$this->news->insertData('bo_user', $data);
        	redirect('backoffice/manage_user');
        }
    }
    public function fokus_news($id)
    {
      // var_dump($id);
      $data = $this->back->dataFokus($id);
      $page = array(
          "thepage" => $this->load->view('back/fokus_news', array('data' => $data, 'id' => $id), true)
      );
      $this->load->view('back/index', $page);
    }
    public function creat_fokus()
    {
        // var_dump($_POST);
        $news_url       = $this->format->seoUrl($this->input->post('fokus_name'));
        $fokus_name     = $this->input->post('fokus_name');
        $fokus_comen    = $this->input->post('fokus_comen');
        $id             = $this->input->post('id');
        $isactive       = $this->input->post('isactive');
        $insert       = array(
                'fokus_url'        => $news_url,
                'fokus_name'       => $fokus_name,
                'fokus_comment'    => $fokus_comen,
                'isActive'         => $isactive,
                );
        $sql = $this->back->insertFokus('fn_fokus', $insert);
        $idta   = $this->db->insert_id(); // Will return the last insert id.
        $data        = array(
            'fokus_id'       => $idta,
            );
            $where        = array(
            'news_id'       => $id,
            );
        $this->db->where($where);
        $this->db->update('fn_news', $data);

        $data = $this->back->contoh($this->session->userdata('id'));
        $page = array(
            "thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
        );
        // var_dump($data);
        $this->load->view('back/index', $page);
    }
    public function creat_fokus_byid()
    {
      // var_dump($_POST);
       // fokus_name
      $fokus_name = $this->input->post('fokus_name');
      $news_id = $this->input->post('id');
      $data = array(
        'fokus_id' => $fokus_name
      );
      $this->db->where('news_id', $news_id);
      $do = $this->db->update('fn_news',$data);
      if($do):
        $this->session->set_flashdata('status', 'Artikel sudah input ke Peristiwa');
        // var_dump($this->db->last_query());
        redirect('backoffice/manage_artikel');
      else:
        show_404();
      endif;
    }
    public function delet_fokus($id)
    {

      // var_dump($id);
      $data        = array(
          'fokus_id'     => null,
          );
      $where        = array(

          'fokus_id'       => $id,
          );
      $sql = $this->back->deleteFokus($where, $data, 'fn_news');
      $data = $this->back->contoh($this->session->userdata('id'));
      $page = array(
          "thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
      );
      // var_dump($data);
      $this->load->view('back/index', $page);
    }
    public function delet_break($id)
    {
        // var_dump($id);
        $where        = array(

            'news_id'       => $id,
            );
        $sql = $this->back->deleteBreak($where, 'fn_news_breaking');
        $data = $this->back->contoh($this->session->userdata('id'));
        $page = array(
            "thepage" => $this->load->view('back/manage_artikel', array('data' => $data), true)
        );
        // var_dump($data);
        $this->load->view('back/index', $page);
    }
    public function manage_iklan()
    {
        $page = array(
            "thepage" => $this->load->view('back/manage_iklan', array(), true)
        );
        $this->load->view('back/index', $page);
    }
    public function upload_iklan()
    {
        $area = $this->input->post('area');
        $config['upload_path']          = 'assets/img/iklan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        switch ($area) {
          case 'header-809x188':
            # code...
            $config['max_width']            = 820;
            $config['max_height']           = 190;
            break;
          case 'body-532x280':
            # code...
            $config['max_width']            = 550; //532
            $config['max_height']           = 300; //280
            break;
          case 'body-532x180':
              # code...
            $config['max_width']            = 550;
            $config['max_height']           = 200;
            break;
          default:
            # code...
            break;
        }



        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error);
                redirect('backoffice/manage_iklan');
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $layout = array(
                  'layout_dir' => $config['upload_path'] ."/".$data['upload_data']['orig_name']
                );
                $this->news->updateData('fn_layout', $layout, 'layout_name', $area);
                $this->session->set_flashdata('status', 'Iklan berhasil diupload');
                redirect('backoffice/manage_iklan');

        }
    }
}
