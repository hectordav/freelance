<?php
class Disponibilidad_model extends CI_Model{
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
#*******************************************************************************


}