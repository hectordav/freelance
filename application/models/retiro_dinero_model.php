<?php
class Retiro_dinero_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function contar_retiro_dinero(){
            $this->db->from('t_retiro_dinero');
            return $this->db->count_all_results();
        }
#*******************************************************************************

}