<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {

  // Home function

  public function get_courses()
  {
    $username = (func_num_args()>0)?func_get_arg(0):null;
    $result = $this->db->query("SELECT c.idcourse as thisidc, c.nmcourse, c.username as owner, u.fullname, c.imgcover, s.specialty, s.color, 
    (SELECT username from user_has_course where idcourse = thisidc and username = '".$username."') as userincourse, 
    (SELECT joined from user_has_course where idcourse = thisidc and username = '".$username."') as userisjoined 
    FROM course c JOIN user u ON c.username = u.username JOIN specialty s ON c.idspc = s.idspc");
    return $result->result();
  }
  public function get_attended($username)
  {
    $this->db->select('*');
    $this->db->from('user_has_course uc');
    $this->db->join('course c', 'c.idcourse = uc.idcourse');
    $this->db->join('user u', 'c.username = u.username');
    $this->db->where('uc.username', $username);
    $result = $this->db->get();
    return $result->result();
  }
  public function get_coursedetail($idcourse)
  {
    $this->db->select('*');
    $this->db->from('course c');
    $this->db->join('user u', 'c.username = u.username');
    $this->db->where('c.idcourse', $idcourse);
    $result = $this->db->get();
    return $result->result();
  }
  public function get_tasks($idcourse)
  {
    $this->db->select('*');
    $this->db->from('task t');
    $this->db->join('course c', 't.idcourse = c.idcourse');
    $this->db->where('t.idcourse', $idcourse);
    $result = $this->db->get();
    return $result->result();
  }
  public function get_materidetail($idmateri)
  {
    $this->db->select('*');
    $this->db->from('materi m');
    $this->db->join('course c', 'm.idcourse = c.idcourse');
    $this->db->join('user u', 'c.username = u.username');
    $this->db->where('m.idmateri', $idmateri);
    $result = $this->db->get();
    return $result->result();
  }
  public function get_taskdetail($idtask)
  {
    $this->db->select('*');
    $this->db->from('task t');
    $this->db->join('course c', 't.idcourse = c.idcourse');
    $this->db->join('user u', 'c.username = u.username');
    $this->db->where('t.idtask', $idtask);
    $result = $this->db->get();
    return $result->result();
  }
  public function is_userdone($username, $idtask)
  {
    $this->db->select('*');
    $this->db->from('user_done_task ut');
    $this->db->join('task t', 't.idtask = ut.idtask');
    $this->db->join('course c', 't.idcourse = c.idcourse');
    $this->db->where('ut.idtask', $idtask);
    $this->db->where('ut.username', $username);
    $result = $this->db->get();
    return $result->result();
  }
  public function set_donetask($data)
  {
    if (!$this->db->insert('user_done_task', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }

  // Dashboard function

  public function get_mycourses($username)
  {
    $this->db->select('*');
    $this->db->from('course c');
    $this->db->join('specialty s', 'c.idspc = s.idspc');
    $this->db->where('c.username', $username);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_courseadmin($idcourse)
  {
    $this->db->select('*');
    $this->db->from('course c');
    $this->db->join('specialty s', 'c.idspc = s.idspc');
    $this->db->join('user u', 'u.username = c.username');
    $this->db->where('c.idcourse', $idcourse);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_coursehasstudent($idcourse)
  {
    $this->db->select('*');
    $this->db->from('user_has_course uc');
    $this->db->join('course c', 'c.idcourse = uc.idcourse');
    $this->db->join('user u', 'u.username = uc.username');
    $this->db->where('uc.idcourse', $idcourse);
    $this->db->where('uc.joined', true);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_countstudent($idcourse)
  {
    $this->db->like('idcourse', $idcourse);
    $this->db->like('joined', true);
    $this->db->from('user_has_course');
    return $this->db->count_all_results(); 
  }
  public function get_coursemateri($idcourse)
  {
    $this->db->select('*');
    $this->db->from('materi m');
    $this->db->join('course c', 'c.idcourse = m.idcourse');
    $this->db->where('c.idcourse', $idcourse);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_countmateri($idcourse)
  {
    $this->db->like('idcourse', $idcourse);
    $this->db->from('materi');
    return $this->db->count_all_results(); 
  }
  public function get_coursetask($idcourse)
  {
    $query = $this->db->query("SELECT idtask as thisid, nmtask, deadline,
      (SELECT COUNT(*) from user_done_task ut, task t 
      WHERE ut.idtask = t.idtask AND ut.idtask = thisid) as counttask FROM task
      WHERE task.idcourse = $idcourse
    ");
    return $query->result();
  }
  public function get_counttask($idcourse)
  {
    $this->db->like('idcourse', $idcourse);
    $this->db->from('task');
    return $this->db->count_all_results(); 
  }
  public function get_taskdone($idcourse)
  {
    $this->db->select('ut.*, u.*, t.*');
    $this->db->from('user_done_task ut');
    $this->db->join('user u', 'ut.username = u.username');
    $this->db->join('task t', 'ut.idtask = t.idtask');
    $this->db->join('course c', 't.idcourse = c.idcourse');
    $this->db->where('c.idcourse', $idcourse);
    $this->db->order_by('ut.submitted_at', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function grading_task($data)
  {
    $this->db->set('graded', true);
    $this->db->set('taskgrade', $data['taskgrade']);
    $this->db->where('username', $data['username']);
    $this->db->where('idtask', $data['idtask']);
    return $this->db->update('user_done_task');
}
  public function get_acceptance($idcourse)
  {
    $this->db->select('*');
    $this->db->from('user_has_course uc');
    $this->db->join('course c', 'c.idcourse = uc.idcourse');
    $this->db->join('user u', 'u.username = uc.username');
    $this->db->where('uc.idcourse', $idcourse);
    $this->db->where('uc.joined', false);
    $query = $this->db->get();
    return $query->result();
  }
  public function create_materi($data)
  {
    if (!$this->db->insert('materi', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }
  public function create_task($data)
  {
    if (!$this->db->insert('task', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }
  public function accept_user($idcourse, $querydata)
  {
    if ($querydata['joined'] == 1) {
      $this->db->set('joined', $querydata['joined']);
      $this->db->where('username', $querydata['username']);
      $this->db->where('idcourse', $idcourse);
      
      return $this->db->update('user_has_course');
    } elseif ($querydata['joined'] == 0) {
      $this->db->where('username', $querydata['username']);
      $this->db->where('idcourse', $idcourse);

      return $this->db->delete('user_has_course');
    } else {
      return false;
    }
  }
  public function get_specialty()
  {
    $this->db->select('*');
    $this->db->from('specialty');
    $query = $this->db->get();
    return $query->result();
  }
  public function create_course($data)
  {
    if (!$this->db->insert('course', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }
}
