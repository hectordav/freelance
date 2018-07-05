<?php
class categoria_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_categoria() {
    	$this->db->order_by('descripcion', 'asc');
        $categoria=$this->db->get('t_categoria');

    if ($categoria->num_rows()>0) {
        return $categoria;
        }else{
        return false;
        }
    }
#*******************************************************************************


}