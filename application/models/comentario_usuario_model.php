<?php
class Comentario_usuario_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_bodega() {
        $bodega=$this->db->get('t_bodega');
    if ($bodega->num_rows()>0) {
        return $bodega;
        }else{
        return false;
        }
    }

    public function guardar_comentario($id_proyecto, $usuario_recibe,$comentario,  $puntaje){
    	$data = array('id_usuario' =>$usuario_recibe ,
    				  'id_proyecto'=>$id_proyecto,
    				  'comentario'=>$comentario,
    				  'puntaje'=>$puntaje);
        $this->db->insert('t_comentario_proyecto',$data);
    }
#*******************************************************************************


}