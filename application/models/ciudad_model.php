<?php
class ciudad_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_sub_categoria() {
        $categoria=$this->db->get('t_sub_categoria');
    if ($categoria->num_rows()>0) {
        return $categoria;
        }else{
        return false;
        }
    }
#*******************************************************************************
 

}