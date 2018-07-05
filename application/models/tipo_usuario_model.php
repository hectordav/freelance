<?php
class Tipo_usuario_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_tipo_usuario() {
      $tipo_usuario=$this->db->get('t_tipo_usuario');
    if ($tipo_usuario->num_rows()>0) {
        return $tipo_usuario;
        }else{
        return false;
        }
    }
#*******************************************************************************
 

}