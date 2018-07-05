<?php
class Rango_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_rango() {
        $dango=$this->db->get('t_rango_precio');
    if ($dango->num_rows()>0) {
        return $dango;
        }else{
        return false;
        }
    }
#*******************************************************************************
 

}