<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mod_RefKelas extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  public function getData($where) {
    return $this->db->get_where('ref_kelas', $where);
  }
  
  public function saveData($edit) {
    $arr = ['kelas'=>$this->input->post('kelas'),'ruang'=> $this->input->post('ruang'), 'status'=>$this->input->post('status')];
    if ($edit === 'true') {
      $this->db->update('ref_kelas',$arr, ['id'=>$this->input->post('idkelas')]);
    } else {
      $this->db->insert('ref_kelas',$arr);
    }
    return $this->db->affected_rows();
  }
}