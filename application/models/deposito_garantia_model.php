<?php
class Deposito_garantia_model extends CI_Model{
    //put your code here
 #*******************************************************************************
    public function get_retiro_dinero($id_retiro) {
      $this->db->select('t_deposito_garantia.id as id_deposito_garantia,  t_deposito_garantia.id_usuario_recibe as id_usuario_recibe, t_usuario.login as login_usuario, t_deposito_garantia.id_proyecto as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_deposito_garantia.id_status_propuesta as id_status_propuesta, t_status_propuesta.descripcion as descripcion_status, t_deposito_garantia.num_factura as num_factura, t_deposito_garantia.monto_sin_comision as monto_sin_comision, t_deposito_garantia.monto_con_comision as monto_con_comision, t_deposito_garantia.fecha_de_pago as fecha_pago, t_deposito_garantia.descripcion_pago as descripcion_pago');
     $this->db->join('t_usuario', 't_deposito_garantia.id_usuario_recibe = t_usuario.id', 'left');
      $this->db->join('t_proyecto', 't_deposito_garantia.id_proyecto = t_proyecto.id', 'left');
      $this->db->join('t_status_propuesta', 't_deposito_garantia.id_status_propuesta = t_status_propuesta.id', 'left');
      $this->db->where('t_deposito_garantia.id', $id_retiro);
      $retiro_dinero=$this->db->get('t_deposito_garantia');
    if ($retiro_dinero->num_rows()>0) {
        return $retiro_dinero;
        }else{
        return false;
        }
    }
   public function get_deposito_garantia($usuario_envia, $usuario_recibe){
      $this->db->where('id_usuario_envia', $usuario_envia);
      $this->db->where('id_usuario_recibe', $usuario_recibe);
      $query=$this->db->get('t_deposito_garantia');
       if ($query->num_rows()>0) {
              return $query;
              }else{
              return false;
              }
          }
     public function sum_deposito_garantia($id_usuario) {
        $this->db->select_sum('monto_sin_comision');
        $this->db->where('id_usuario_recibe', $id_usuario);
        $deposito = $this->db->get('t_deposito_garantia');
    if ($deposito->num_rows()>0) {
        return $deposito;
        }else{
        return false;
        }
    }
    public function sum_deposito_garantia_todo() {
        $this->db->select_sum('monto_sin_comision');
        $deposito = $this->db->get('t_deposito_garantia');
    if ($deposito->num_rows()>0) {
        return $deposito;
        }else{
        return false;
        }
    }
    public function guardar_retiro_dinero($login_usuario, $titulo_proyecto, $num_factura, $monto_sin_comision, $monto_con_comision, $fecha_pago){
    	$data = array('login_usuario' =>$login_usuario ,
    				  'titulo_proyecto'=>$titulo_proyecto,
    				   'num_factura'=>$num_factura,
    				   'monto_sin_comision'=>$monto_sin_comision,
    				   'monto_con_comision'=>$monto_con_comision,
    				   'fecha_de_pago'=>$fecha_pago);
    	$this->db->insert('t_retiro_dinero',$data);
    }
    public function guardar_deposito_garantia($id_usuario_remitente,$id_usuario_recibe,$id_proyecto,$id_status,$num_factura, $monto_sin_comision, $monto_con_comision,$fecha_pago, $descripcion){
      $data = array('id_usuario_envia' =>$id_usuario_remitente ,
              'id_usuario_recibe'=>$id_usuario_recibe,
               'id_proyecto'=>$id_proyecto,
               'id_status_propuesta'=>$id_status,
               'num_factura'=>$num_factura,
               'monto_sin_comision'=>$monto_sin_comision,
               'monto_con_comision'=>$monto_con_comision,
               'fecha_de_pago'=>$fecha_pago,
               'descripcion_pago'=>$descripcion);
      $this->db->insert('t_deposito_garantia',$data);
    }
    public function actualizar_retiro_dinero($id_deposito){
      $this->db->where('id', $id_deposito);
      $data = array('id_status_propuesta' =>4);
      $this->db->update('t_deposito_garantia',$data);

    }
#*******************************************************************************
}