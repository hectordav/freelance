<?php
class Plan_model extends CI_Model{
    //put your code here

    public function guardar_plan($titulo_plan) {
        $data = array('descripcion' =>$titulo_plan);
        $this->db->insert('t_plan', $data);

    }
   public function get_max_plan() {
      $this->db->select_max('id');
        $plan=$this->db->get('t_plan');
    if ($plan->num_rows()>0) {
        return $plan;
        }else{
        return false;
        }
    }

   public function get_plan($id_plan) {
      $this->db->where('id', $id_plan);
        $plan=$this->db->get('t_plan');
    if ($plan->num_rows()>0) {
        return $plan;
        }else{
        return false;
        }
    }
    public function guardar_det_plan($id_plan,$descripcion){
        $data = array('id_plan' =>$id_plan,
        'descripcion'=>$descripcion);
        $this->db->insert('t_det_plan', $data);

    }
     public function get_det_plan($id_plan){
    $this->db->where('id_plan', $id_plan);
    $det_plan=$this->db->get('t_det_plan');
    if ($det_plan->num_rows()>0) {
        return $det_plan->result();
        }else{
        return false;
        }
    }
    public function eliminar_det_plan($id_det_plan){
    $this->db->where('id', $id_det_plan);
    $this->db->delete('t_det_plan');
    }

}