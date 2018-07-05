<?php
class Favorito_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_disponibilidad() {
        $tipo_proyecto=$this->db->get('t_disponibilidad');
    if ($tipo_proyecto->num_rows()>0) {
        return $tipo_proyecto;
        }else{
        return false;
        }
    }
    public function guardar_favorito($usuario_envia, $usuario_recibe){
    $data = array('id_usuario_envia' =>$usuario_envia,
     			  'id_usuario_recibe'=>$usuario_recibe);
    $this->db->insert('t_favorito', $data);
    }
#*******************************************************************************


}