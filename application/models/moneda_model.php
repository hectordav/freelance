<?php
class Moneda_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_tipo_moneda() {
      	$this->db->order_by('moneda', 'asc');
        $tipo_moneda=$this->db->get('t_tipo_moneda');
    if ($tipo_moneda->num_rows()>0) {
        return $tipo_moneda;
        }else{
        return false;
        }
    }
#*******************************************************************************


}