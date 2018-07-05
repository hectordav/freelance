<?php
class Perfil_model extends CI_Model{
    //put your code here
 #*******************************************************************************
    public function get_perfil() {
      $perfil=$this->db->get('t_perfil');
    if ($perfil->num_rows()>0) {
        return $perfil;
        }else{
        return false;
        }
    }
    public function get_perfil_id($id_perfil) {
      $this->db->where('id', $id_perfil);
      $perfil=$this->db->get('t_perfil');
    if ($perfil->num_rows()>0) {
        return $perfil;
        }else{
        return false;
        }
    }
#*******************************************************************************
}