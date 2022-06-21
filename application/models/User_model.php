<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function usernm_check($username)
  {
    $this->db->where('username', $username);
    $out = $this->db->get('user');
    if ($out->num_rows() == 0) {
      return true;
    } else {
      return false;
    }
  }
  public function get_user($username)
  {
    $this->db->where('username', $username);
    $out = $this->db->get('user');
    return $out->result();
  }
  public function register_user($data)
  {
    if (!$this->db->insert('user', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      $this->db->select('username');
      $this->db->where('username', $data['username']);
      $insert_id = $this->db->get('user');
      $result = $insert_id->result();
      $this->session->set_userdata('username', $result[0]->username);
      return true;
    }
  }
  public function login_user($username, $password)
  {
    $this->db->where('username', $username);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $stored_pass = $this->encryption->decrypt($row->password);
        if ($password == $stored_pass) {
          $this->session->set_userdata('username', $row->username);
          return 3;
        } else {
          return 2;
        }
      }
    } else {
      return 1;
    }
  }
  public function join_class($data)
  {
    if (!$this->db->insert('user_has_course', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }
  public function be_teacher($username)
  {
    $this->db->where('username', $username);
    if ($this->db->update('user', array('is_teacher' => true))) {
      return true;
    }
    return false;
  }
}
