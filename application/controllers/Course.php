<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect(base_url('home'));
    }
    $this->load->model('user_model');
    $this->load->model('course_model');
  }
  public function module($idcourse, $idmateri)
  {
    $getmateri = $this->course_model->get_materidetail($idmateri);
    if (count($getmateri) > 0) {
      $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
      $data['materi'] = $getmateri;
      $data['beforeidcrs'] = $idcourse;
      $this->load->view('header', $data);
      $this->load->view('material', $data);
      $this->load->view('footer', $data);
    } else {
      redirect(base_url('course/index/'.$idcourse.'#materi'));
    }
  }
  public function inputtask($idcourse, $idtask)
  {
    if(!empty($_FILES['file']['name'])){

      $config['upload_path'] = './files/'; 
      $config['allowed_types'] = 'jpg|jpeg|png|gif|docx|pdf|ppt|mp4';
      $config['max_size'] = 100000; // max_size in kb
      $config['file_name'] = $_FILES['file']['name'];
 
      $this->load->library('upload',$config); 
 
      if($this->upload->do_upload('file')){
        $uploadData = $this->upload->data();
        $data = array(
          'username' => $this->session->userdata('username'),
          'idtask' => $idtask,
          'file_name' => $uploadData['file_name'],
          'taskgrade' => 0,
          'graded' => false
        );
        if ($this->course_model->set_donetask($data)) {
          redirect(base_url('course/task/'.$idcourse.'/'.$idtask));
        }
      } else {
        redirect(base_url('course/task/'.$idcourse.'/'.$idtask));
      }
    }
  }
  public function task($idcourse, $idtask)
  {
    $gettask = $this->course_model->get_taskdetail($idtask);
    if (count($gettask) > 0) {
      $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
      $data['userdt'] = $this->course_model->is_userdone($this->session->userdata('username'), $idtask);
      $data['task'] = $gettask;
      $data['beforeidcrs'] = $idcourse;
      $this->load->view('header', $data);
      $this->load->view('task', $data);
      $this->load->view('footer', $data);
    } else {
      redirect(base_url('course/index/'.$idcourse.'#task'));
    }
  }
  public function download($filename)
  {
    $this->load->helper('download');
    $data = file_get_contents(base_url('./files/'.$filename));
    force_download($filename, $data);
  }
  public function index()
	{
    $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
    if ($this->uri->segment(3)) {
      $idcourse = $this->uri->segment(3);
      $data['coursedetail'] = $this->course_model->get_coursedetail($idcourse);
      $data['taskcount'] = $this->course_model->get_counttask($idcourse);
      $data['matericount'] = $this->course_model->get_countmateri($idcourse);
      $data['studentcount'] = $this->course_model->get_countstudent($idcourse);
      $data['materi'] = $this->course_model->get_coursemateri($idcourse);
      $data['task'] = $this->course_model->get_tasks($idcourse);
      $this->load->view('header', $data);
      $this->load->view('course', $data);
      $this->load->view('footer', $data);
    } else {
      redirect(base_url('home'));
    }
	}
}
