<?php
class Preferencia_model extends CI_Model{
    //put your code here

 #*******************************************************************************
   public function guardar_preferencia($id_usuario,$id_sub_cat){
   		$data = array('id_usuario' =>$id_usuario,
   					'id_sub_categoria'=>$id_sub_cat);
   		$this->db->insert('t_preferencia', $data);
   }
#*******************************************************************************


}