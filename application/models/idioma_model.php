<?php
class Idioma_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_idioma() {
        $idioma=$this->db->get('t_idioma');
    if ($idioma->num_rows()>0) {
        return $idioma;
        }else{
        return false;
        }
    }

     public function guardar_det_idioma($id_usuario,$id_idioma,$porcentaje) {
    	$data = array('id_usuario'=>$id_usuario,
    	'id_idioma' =>$id_idioma,
    	'porcentaje'=>$porcentaje);
        $this->db->insert('t_det_idioma', $data);
    }
     public function guardar_det_idioma_proyecto($id_usuario,$id_idioma) {
        $data = array('id_usuario'=>$id_usuario,
        'id_idioma' =>$id_idioma);
        $this->db->insert('t_det_idioma_proyecto', $data);
    }
#*******************************************************************************
    public function get_id_det_idioma($id_idioma,$porcentaje) {
    	$this->db->where('id_idioma', $id_idioma,
    					 'porcentaje',$porcentaje);
        $idioma=$this->db->get('t_det_idioma');
    if ($idioma->num_rows()>0) {
        return $idioma;
        }else{
        return false;
        }
    }
#*******************************************************************************


}