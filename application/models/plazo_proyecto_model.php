<?php
class Plazo_proyecto_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_plazo_proyecto() {
        $plazo=$this->db->get('t_plazo_entrega');
    if ($plazo->num_rows()>0) {
        return $plazo;
        }else{
        return false;
        }
    }
#*******************************************************************************
 

}