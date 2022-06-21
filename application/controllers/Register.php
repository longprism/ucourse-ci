<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('username')) {
      redirect(base_url('home'), 'refresh');
    }
    $this->load->model('user_model');
  }
	public function validation()
  {
    $isvalid = $this->user_model->usernm_check($this->input->post('username'));
    if ($isvalid) {
      $config['upload_path']          = './imgs/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100000;
      $this->load->library('upload', $config);  
      if ($this->upload->do_upload('avatar')) {
        $temp = $this->upload->data();
        $filename = $temp['file_name'];
      } else {
        $error = array('error' => $this->upload->display_errors());
        $msg=3;
        redirect(base_url().'register/index/'.$msg);
      }
      if (isset($filename)) {
        $encrypt = $this->encryption->encrypt($this->input->post('password'));
        $data = array(
          'username' => $this->input->post('username'),
          'fullname' => $this->input->post('fullname'),
          'password' => $encrypt,
          'tgllahir' => date("Y-m-d", strtotime($this->input->post('birthdate'))),
          'profesi' => $this->input->post('profession'),
          'edu' => $this->input->post('education'),
          'origin' => $this->input->post('origin'),
          'skill' => $this->input->post('skills'),
          'pprofile' => $filename,
          'is_teacher' => false
        );
        $success = $this->user_model->register_user($data);
        if (!$success) {
          $msg=2;
          redirect(base_url().'register/index/'.$msg);
        } else {          
          redirect(base_url().'home');
        }
      }
    } else {
      $msg=1;
      redirect(base_url().'register/index/'.$msg);
    }
  }
  public function index()
	{
    $data['msg'] = (func_num_args()>0)?func_get_arg(0):null;
    $this->load->view('register', $data);
	}
}
