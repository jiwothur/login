<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
  function __construct(){
    parent::__construct();
  }
  function login(){
    $this->load->view('head');
    $this->load->view('login');
    $this->load->view('footer');
  }
  function memo(){
    $this->load->view('head');
    $this->load->view('memo');
    $this->load->view('footer');
  }
  function logout(){
    $this->session->sess_destroy();
    $this->load->helper('url');
    redirect('/topic');
  }
  function register(){
    $this->load->view('head');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
    $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
    $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
  if($this->form_validation->run() === false){
    $this->load->view('register');
  }
  else {
    if(!function_exists('password_hash')){
      $this->load->helper('password');
    }
    $hash = password_hash($this->input->post('password'),PASSWORD_BCRYPT);


    $this->load->model('user_model');
    $this->user_model->add(array(
      'email'=>$this->input->post('email'),
      'password'=>$hash,
      'nickname'=>$this->input->post('nickname')
    ));
    $this->session->set_flashdata('message','회원가입 성공');
    $this->load->helper('url');
    redirect('/topic');

  }




    $this->load->view('footer');
  }
  function authentication(){
    $this->load->model('user_model');
    $user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
  if($this->input->post('email') == $user->email &&
  password_verify($this->input->post('password'),$user->password)
  ){
    $this->session->set_userdata('is_login',true);
    $this->load->helper('url');
    redirect("/topic");
  }
  else {
    echo '불일치';
    $this->session->set_flashdata('message','로그인 실패');
    $this->load->helper('url');
    redirect('/auth/login');
  }
  }
}
