<?php
class Pais_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_pais() {
      $pais=$this->db->get('t_pais_usuario');
    if ($pais->num_rows()>0) {
        return $pais;
        }else{
        return false;
        }
    }
    public function get_ciudad($id_pais) {
        $this->db->select('id, ciudad');
        $this->db->where('cod_pais', $id_pais);
         $this->db->order_by('ciudad', 'asc');
        $pais=$this->db->get('t_ciudad',2000);
       if($pais->num_rows() > 0){
            return $pais->result();
            }
    }
    public function get_pais_proyecto() {
      $pais=$this->db->get('t_pais_usuario');
    if ($pais->num_rows()>0) {
        return $pais;
        }else{
        return false;
        }
    }
    public function pais_usuario($pais) {
        $this->db->select('cod');
        $this->db->from('t_pais_usuario');
        $this->db->where('pais', $pais);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
#*******************************************************************************


}