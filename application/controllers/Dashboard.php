<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('course_model');
    $getuser = $this->user_model->get_user($this->session->userdata('username'));
    if (!$getuser[0]->is_teacher) {
      redirect(base_url('home'));
    }
  }
  public function grading($idcourse)
  {
    $data = array(
      'username' => $this->input->post('username'),
      'idtask' => $this->input->post('idtask'),
      'taskgrade' => $this->input->post('taskgrade')
    );
    if ($this->course_model->grading_task($data)) {
      redirect(base_url('dashboard/course/'.$idcourse));
    }
    redirect(base_url('dashboard/course/'.$idcourse.'#task'));
  }
  public function download($filename)
  {
    $this->load->helper('download');
    $data = file_get_contents(base_url('./files/'.$filename));
    force_download($filename, $data);
  }
  public function course()
  {
    $idcourse =  $this->uri->segment(3);
    if ($idcourse != null) {
      $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
      $data['courseadmin'] = $this->course_model->get_courseadmin($idcourse);
      $data['student'] = $this->course_model->get_coursehasstudent($idcourse);
      $data['countstudent'] = $this->course_model->get_countstudent($idcourse);
      $data['materi'] = $this->course_model->get_coursemateri($idcourse);
      $data['countmateri'] = $this->course_model->get_countmateri($idcourse);
      $data['task'] = $this->course_model->get_coursetask($idcourse);
      $data['counttask'] = $this->course_model->get_counttask($idcourse);
      $data['donetask'] = $this->course_model->get_taskdone($idcourse);
      $data['permission'] = $this->course_model->get_acceptance($idcourse);
      $this->load->view('header', $data);
      $this->load->view('db_input', $data);
      $this->load->view('footer', $data);
    } else {
      redirect(base_url('dashboard'));
    }
  }
  public function creatematerial($idcourse)
  {
    $data = array(
      'nmmateri' => $this->input->post('nmmateri'),
      'descrm' => $this->input->post('descrm'),
      'idcourse' => $idcourse
    );
    $suces = $this->course_model->create_materi($data);
    redirect(base_url('dashboard/course/'.$idcourse));
  }
  public function createtask($idcourse)
  {
    $data = array(
      'nmtask' => $this->input->post('nmtask'),
      'descrt' => $this->input->post('descrt'),
      'deadline' => date("Y-m-d H:i:s", strtotime($this->input->post('deadline'))),
      'idcourse' => $idcourse
    );
    if ($this->course_model->create_task($data)) {
      redirect(base_url('dashboard/course/'.$idcourse.'#task'));
    } else {
      redirect(base_url('dashboard/course/'.$idcourse.'#task'));
    }
  }
  public function accept($idcourse)
  {
    $querydata = array(
      'username'=>$this->input->post('username'),
      'joined'=> $this->input->post('join')
    );
    if ($this->course_model->accept_user($idcourse, $querydata)) {
      redirect(base_url('dashboard/course/'.$idcourse.'#permission'));
    } else {
      redirect(base_url('dashboard/course/'.$idcourse.'#permission'));
    }
  }
  public function create()
  {
    $config['upload_path']          = './imgs/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100000;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('banner')) {
      $temp = $this->upload->data();
      $filename = $temp['file_name'];
    } else {
      $error = array('error' => $this->upload->display_errors());
      $msg=2;
      redirect(base_url().'dashboard'.$msg);
    }
    if (isset($filename)) {
      $data = array(
        'nmcourse' => $this->input->post('nmcourse'),
        'descr' => $this->input->post('descr'),
        'idspc' => $this->input->post('specialty'),
        'username' => $this->input->post('username'),
        'imgcover' => $filename
      );
      $success = $this->course_model->create_course($data);
      if ($success) {
        redirect(base_url().'dashboard');
      } else {
        $msg=1;
        redirect(base_url().'dashboard'.$msg);
      }
    }
  }
  public function index()
	{
    $data['user'] = $this->user_model->get_user($this->session->userdata('username'));
    $data['course'] = $this->course_model->get_mycourses($this->session->userdata('username'));
    $data['special'] = $this->course_model->get_specialty();
    $this->load->view('header', $data);
    $this->load->view('db_course', $data);
    $this->load->view('footer', $data);
	}
}
