<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('course_model');
  }
  
  public function index()
	{
    $data=null;
    if ($this->session->userdata('username')) {
      $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
      $data['course']=$this->course_model->get_courses($this->session->userdata('username'));
      $data['attended']=$this->course_model->get_attended($this->session->userdata('username'));
    } else {
      $data['course']=$this->course_model->get_courses();
    }
    $this->load->view('header', $data);
    $this->load->view('home', $data);
    $this->load->view('footer', $data);
	}
  public function join()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'idcourse' => $this->input->post('join1'),
      'joined' => false
    );
    $result = $this->user_model->join_class($data);
    if ($result) {
      redirect(base_url('home'));
    }
  }
  public function be_lecturer($username)
  {
    $success = $this->user_model->be_teacher($username);
    if ($success) {
      redirect(base_url('home'));
    }
  }
  public function logout()
  {
    $data = $this->session->all_userdata();
    foreach ($data as $row => $rows_value) {
      $this->session->unset_userdata($row);
    }
    redirect(base_url('login'));
  }
}
