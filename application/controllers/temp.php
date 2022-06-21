<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class temp extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('course_model');
  }
  public function index()
	{
    $this->load->view('header');
    $this->load->view('course');
    $this->load->view('footer');
	}
}
