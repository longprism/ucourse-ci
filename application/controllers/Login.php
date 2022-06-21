<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username')) {
      redirect(base_url().'home');
    }
    $this->load->model('user_model');
  }
  public function validation()
  {
    $hasil = $this->user_model->login_user($this->input->post('username'), $this->input->post('password'));
    if ($hasil == 3) {
      redirect(base_url().'home');
    } else {
      redirect(base_url().'login/index/'.$hasil);
    }
  }
  public function index()
	{
    $data['msg'] = (func_num_args()>0)?func_get_arg(0):null;
    $this->load->view('login', $data);
	}
}
