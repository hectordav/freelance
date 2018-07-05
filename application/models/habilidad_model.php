<?php
class Habilidad_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function guardar_habilidad($habilidad,$porcentaje) {
    	$data = array('descripcion' =>$habilidad,
    	'porcentaje'=>$porcentaje);
        $this->db->insert('t_habilidad', $data);
    }
#*******************************************************************************
    public function get_id_habilidad($habilidad,$porcentaje) {
    	$this->db->where('descripcion', $habilidad,
    					 'porcentaje',$porcentaje);
        $habilidad=$this->db->get('t_habilidad');
    if ($habilidad->num_rows()>0) {
        return $habilidad;
        }else{
        return false;
        }
    }

}