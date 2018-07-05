<?php
class Propuesta_model extends CI_Model{
    //put your code here
 #*******************************************************************************
    public function guardar_propuesta ($id_proyecto, $archivo, $id_usuario_envia, $id_usuario_receptor,$id_status_mensaje, $neto, $ganancia, $total, $mensaje, $fecha) {
        $data = array('id_proyecto' =>$id_proyecto,
        'id_usuario_envia'=>$id_usuario_envia,
        'id_usuario_recibe'=>$id_usuario_receptor,
        'id_status_mensaje'=>$id_status_mensaje,
        'id_status_propuesta'=>1,
        'descripcion'=>$mensaje,
        'precio_sin_comision'=>$neto,
        'comision'=>$ganancia,
        'precio_con_comision'=>$total,
        'archivo'=>$archivo,
        'fecha'=>$fecha
         );
        $this->db->insert('t_propuesta', $data);
    }
#*******************************************************************************
  public function get_propuesta($id_usuario_receptor){
    $this->db->select('t_propuesta.id as id_propuesta,t_propuesta.descripcion as propuesta, t_propuesta.fecha as fecha_propuesta, t_propuesta.archivo as archivo_propuesta, t_propuesta.precio_sin_comision as precio_propuesta, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_propuesta.id_usuario_recibe as id_usuario_recibe, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_propuesta.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_propuesta.id_usuario_envia= t_usuario.id', 'left');
    $this->db->where('t_propuesta.id_usuario_recibe', $id_usuario_receptor);
     $this->db->order_by('t_propuesta.id', 'DESC'); // or 'DESC'
    $query= $this->db->get('t_propuesta');
    if($query->num_rows()>0){
        return $query;
    }else{
        return false;
    }
  }
  public function buscar_propuesta_id_usuario($id_usuario){
            $this->db->from('t_propuesta');
            $this->db->where('id_usuario_recibe',$id_usuario);
            $this->db->where('id_status_mensaje',2);
            return $this->db->count_all_results();
        }

   public function get_mensaje_enviado($id_usuario_envia){
    $this->db->select('t_mensaje.id as id_mensaje,t_mensaje.mensaje as mensaje, t_mensaje.fecha as fecha_mensaje, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_mensaje.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_mensaje.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('id_usuario_envia', $id_usuario_envia);
     $this->db->order_by('t_mensaje.id', 'DESC'); // or 'DESC'
    $query= $this->db->get('t_mensaje');
    if($query->num_rows()>0){
        return $query;
    }else{
        return false;
    }
  }
  #***********************Para el json-encode****************************************
  public function get_propuesta_id($id_usuario_envia,$id_proyecto){
    $this->db->select('t_propuesta.id as id_mensaje,t_propuesta.descripcion as mensaje, t_propuesta.fecha as fecha_mensaje, t_propuesta.archivo as archivo_propuesta, t_propuesta.precio_sin_comision as precio_propuesta, t_propuesta.precio_con_comision as precio_con_comision_propuesta, t_propuesta.id_status_propuesta as id_status_propuesta, t_status_propuesta.descripcion as descripcion_status_propuesta, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_propuesta.id_usuario_recibe as id_usuario_recibe, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_propuesta.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_status_propuesta', 't_propuesta.id_status_propuesta=t_status_propuesta.id', 'left');
    $this->db->join('t_usuario', 't_propuesta.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('t_propuesta.id_usuario_envia', $id_usuario_envia);
    $this->db->where('t_propuesta.id_proyecto', $id_proyecto);
    $query= $this->db->get('t_propuesta');
        if($query->num_rows()>0){
            return $query->result();
            }else{
            return false;
            }
    }
    /************************************************************************/
    public function get_propuesta_id_sin_encode($id_mensaje){
    $this->db->select('t_propuesta.id as id_mensaje,t_propuesta.descripcion as mensaje, t_propuesta.fecha as fecha_mensaje, t_propuesta.archivo as archivo_propuesta, t_propuesta.precio_sin_comision as precio_propuesta,  t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_propuesta.id_usuario_recibe as id_usuario_recibe, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_propuesta.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_propuesta.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('t_propuesta.id', $id_mensaje);
    $query= $this->db->get('t_propuesta');
       if($query->num_rows()>0){
        return $query;
        }else{
            return false;
        }
    }
     public function get_propuesta_id_para_aceptarla($id_usuario_envia,$id_proyecto){
    $this->db->select('t_propuesta.id as id_propuesta,t_propuesta.descripcion as mensaje, t_propuesta.fecha as fecha_mensaje, t_propuesta.archivo as archivo_propuesta, t_propuesta.precio_sin_comision as precio_propuesta, t_propuesta.precio_con_comision as precio_con_comision_propuesta, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_propuesta.id_usuario_envia, t_propuesta.id_usuario_recibe as id_usuario_recibe, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_propuesta.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_propuesta.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('t_propuesta.id_proyecto', $id_proyecto);
    $this->db->where('t_propuesta.id_usuario_envia', $id_usuario_envia);
    $query= $this->db->get('t_propuesta');
       if($query->num_rows()>0){
        return $query;
        }else{
            return false;
        }
    }
     public function actualizar_propuesta_leido ($id_proyecto, $id_status_mensaje){
        $data = array('id_status_mensaje' =>$id_status_mensaje);
        $this->db->where('id', $id_proyecto);
        $this->db->update('t_propuesta', $data);
    }
     public function actualizar_propuesta_status ($id_propuesta, $id_status_propuesta) {
        $data = array('id_status_propuesta' =>$id_status_propuesta);
        $this->db->where('id', $id_propuesta);
        $this->db->update('t_propuesta', $data);
    }
    public function liberar_deposito_garantia_id_usuario_recibe($id_deposito){
        $data = array('id_status_propuesta' =>3);
        $this->db->where('id',$id_deposito);
        $this->db->update('t_deposito_garantia', $data);
    }
public function buscar_propuesta_id($id_proyecto,$usuario_envia,$usuario_recibe
){  $query=$this->db->get('t_propuesta');
    $this->db->where('id_usuario_envia', $usuario_recibe);
    $this->db->where('id_usuario_recibe', $usuario_envia);
    $this->db->where('id_proyecto', $id_proyecto);

     if($query->num_rows()>0){
        return $query;
        }else{
            return false;
        }
}
public function buscar_propuesta_id_liberar_dinero($id_propuesta){
    $this->db->where('id', $id_propuesta);
    $query=$this->db->get('t_propuesta');
     if($query->num_rows()>0){
        return $query;
        }else{
            return false;
        }
}
}