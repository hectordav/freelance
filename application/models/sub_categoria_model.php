<?php
class sub_categoria_model extends CI_Model{
    //put your code here

 #**********************para los Selects Dinamicos******************************
    public function get_sub_categoria($id_categoria) {
    	$this->db->where('id_categoria', $id_categoria);
    	$this->db->order_by('descripcion', 'asc');
        $sub_categoria=$this->db->get('t_sub_categoria');
     if($sub_categoria->num_rows() > 0){
            return $sub_categoria->result();
        }
    }
#*******************************************************************************


}