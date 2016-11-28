<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
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
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news');
        $this->load->library('session');
        $this->load->library('facebook');
        $this->load->config('mailer');
        $this->load->library('encrypt');
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

        if ($this->form_validation->run() == false) {
            $this->load->view('back/login');
        } else {
            $data = $this->mymodel->modelLoginSession($this->input->post('username'));
            $this->session->set_userdata($data);
            if ($redirect == null):
                redirect('backoffice/index'); else:
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

        if ($this->form_validation->run() == false) {
            $resonse['valid'] = false;
            $resonse['valid_msg'] = validation_errors();
            $resonse['msg'] = '';
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($resonse));
            // exit;
        } else {

            $key = base64_encode($this->encrypt->encode($this->input->post('email')));
            $data = array(
                'username' => $this->input->post('email'),
                'email' => $this->input->post('email'),
                'full_name' => $this->input->post('full_name'),
                'password' => md5($this->config->item('encryption_key').$this->input->post('password')),
                'group_id' => 3,
                'key' => $key
            );

            $insert = $this->news->insertData('bo_user', $data);
            // Send Email
            $link = base_url('auth/activation/?key='. $key);
            $data['nama'] = $this->input->post('full_name');
            $data['link'] = $link;
            $body = $this->load->view('email/register', ['data' => $data] , true);
            $this->send_email($this->input->post('email'), 'Aktifkan akun anda segera', $body);
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

        if ($this->form_validation->run() == false) {
            $resonse['valid'] = false;
            $resonse['valid_msg'] = validation_errors();
            $resonse['msg'] = '';
            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode($resonse));
            // exit;
        } else {
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
        $password = md5($this->config->item('encryption_key').$this->input->post('password'));
        if ($this->mymodel->modelLogin('bo_user', array('username' => $username, 'password' => $password))) {
            // cek Kalo gak aktif
            if($this->mymodel->cek_is_active($username)):
              return true;
            else:
                $this->form_validation->set_message('verfiyUser', 'Anda belum Memverifikasi email anda, silahkan klik tautan pada email anda atau, <a href="' . base_url('auth/resend_activation/?key='. $username) . '" style="color: blue">Kirim ulang link Konfirmasi</a>');
                return false;
            endif;
        } else {
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
        if (isset($resonse)):
            redirect(base_url()); else:
            redirect(urldecode($redirect));
        endif;
    }
    public function facebook()
    {
        $this->load->model('mymodel');
        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error'])) {
                $data = $user;
            }
            // Inert Data
            $data_users = array(
                'username' => $data['email'],
                'full_name' => $data['name'],
                'email' => $data['email'],
                'group_id' => 3,
                'password' => '405e9bc94b09ffd77a7e26c1c9156c1f',
            );
            $cekusers = $this->news->getData('bo_user', 'id', array('username' => $data['email']));
            if (count($cekusers) <= 0):
            $lakukan = $this->news->insertData('bo_user', $data_users); else:
            $lakukan = true;
            endif;
            if ($lakukan):
                $data = $this->mymodel->modelLoginSession($data['email']);
            $this->session->set_userdata($data);
            redirect('', 'refresh'); else:
                echo 'Facebook login gagal, akses tidak dapat dilanjutkan';
            endif;
        }
    }
    public function test()
    {
      $key = 'iIXG4wHKaYU9pkgdSNYJ7efr6A1lAHotIfagq+YXuzjy4ZI6htb/lWj5LEnB4AO5iRFFJnpYlgwWyDB5AzhQRw==';
      var_dump(base64_encode($key));
      // echo $this->encrypt->decode($key);

    }
    public function resend_activation()
    {
      $encrypt_email = $this->input->get('key');
      $key = base64_encode($this->encrypt->encode($encrypt_email));
      $data = [
        'key' => $key,
        'is_active' => false
      ];

      $this->db->update('bo_user', $data, array('username' => $encrypt_email));
      $link = base_url('auth/activation/?key='. $key);
      $data['nama'] = $encrypt_email;
      $data['link'] = $link;
      $body = $this->load->view('email/register', ['data' => $data] , true);
      $this->send_email($encrypt_email, 'Aktifkan akun anda segera', $body);
      redirect('/');
    }
    public function activation()
    {
      $key = base64_decode($this->input->get('key'));
      $asli = $this->encrypt->decode($key);
      // Cek if true;
      $this->db->select('username');
      $this->db->from('bo_user');
      $this->db->where('username', $asli);
      $get = $this->db->get()->result();
      if(count($get) > 0):
        $this->db->update('bo_user', ['is_active' => true], ['username' => $asli]);
        echo "Berhasil Mengaktifkan akun anda, silahkan tunggu halaman akan dialihkan";
        // sleep(2);
        // redirect('/');
        $this->output->set_header('refresh:5;url=/');
      else:
        echo "Gagal mengaktifkan akun anda";
        // sleep(2);
        // redirect('/');
      endif;
    }
    public function send_email($to, $subject, $body)
    {
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = $this->config->item('m_host');
      $mail->SMTPAuth = true;
      $mail->Username = $this->config->item('m_username');
      $mail->Password = $this->config->item('m_password');
      $mail->SMTPSecure = $this->config->item('m_smtp_secure');
      $mail->Port = $this->config->item('m_port');
      $mail->setFrom($this->config->item('m_username'), 'terasberita.co');
      $mail->addAddress($to);
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $body;
      return (!$mail->send()) ? $mail->ErrorInfo : true;
    }
}
