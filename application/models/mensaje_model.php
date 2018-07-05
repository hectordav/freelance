<?php
class Mensaje_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function guardar_mensaje ($id_proyecto, $id_usuario_envia, $id_usuario_receptor, $status_mensaje, $mensaje, $fecha) {
        $data = array('id_proyecto' =>$id_proyecto,
        'id_usuario_envia'=>$id_usuario_envia,
        'id_usuario_receptor'=>$id_usuario_receptor,
        'id_status_mensaje'=>$status_mensaje,
        'mensaje'=>$mensaje,
        'fecha'=>$fecha,
        'id_usuario'=>$id_usuario_envia
         );
        $this->db->insert('t_mensaje', $data);

    }
#*******************************************************************************
  public function get_mensaje_recibido($id_usuario_receptor){
    $this->db->select('t_mensaje.id as id_mensaje,t_mensaje.mensaje as mensaje, t_mensaje.fecha as fecha_mensaje, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_usuario.imagen as imagen_usuario, t_mensaje.id_usuario_receptor as id_usuario_recibe, t_mensaje.id_status_mensaje as status_mensaje');
    $this->db->join('t_proyecto', 't_mensaje.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_mensaje.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('id_usuario_receptor', $id_usuario_receptor);

    $this->db->group_by('t_mensaje.id_usuario_envia');
    $query= $this->db->get('t_mensaje');
    if($query->num_rows()>0){
        return $query;
    }else{
        return false;
    }
  }
   public function get_mensaje_recibido_sin_leer($id_usuario_receptor){
    $this->db->select('t_mensaje.id as id_mensaje,t_mensaje.mensaje as mensaje, t_mensaje.fecha as fecha_mensaje, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_usuario.imagen as imagen_usuario, t_mensaje.id_usuario_receptor as id_usuario_recibe, t_mensaje.id_status_mensaje as status_mensaje');
    $this->db->join('t_proyecto', 't_mensaje.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_mensaje.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('id_usuario_receptor', $id_usuario_receptor);
    $this->db->where('t_mensaje.id_status_mensaje',2);
    $this->db->group_by('t_mensaje.id_usuario_envia');
    $query= $this->db->get('t_mensaje');
    if($query->num_rows()>0){
        return $query;
    }else{
        return false;
    }
  }

  public function contar_mensaje_recibido($id_usuario_receptor){
    $this->db->select('t_mensaje.id as id_mensaje,t_mensaje.mensaje as mensaje, t_mensaje.fecha as fecha_mensaje, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_usuario.nombre as nombre_usuario_envia, t_usuario.id as id_usuario_envia, t_usuario.imagen as imagen_usuario, t_mensaje.id_usuario_receptor as id_usuario_recibe');
    $this->db->join('t_proyecto', 't_mensaje.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_mensaje.id_usuario_envia = t_usuario.id', 'left');
    $this->db->where('id_usuario_receptor', $id_usuario_receptor);
     $this->db->order_by('t_mensaje.id', 'DESC'); // or 'DESC'
    $query= $this->db->get('t_mensaje');
    if($query->num_rows()>0){
        return $query;
    }else{
        return false;
    }
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
   public function buscar_mensaje_id_usuario($id_usuario){
            $this->db->from('t_mensaje');
            $this->db->where('id_usuario_receptor',$id_usuario);
            $this->db->where('id_status_mensaje',2);
            return $this->db->count_all_results();
    }

  #***********************Para el json-encode****************************************
  public function get_mensaje_id($id_usuario_envia, $id_usuario_receptor,$id_proyecto){
    $this->db->select('t_mensaje.id as id_mensaje,t_mensaje.mensaje as mensaje, t_mensaje.fecha as fecha_mensaje, t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto,t_mensaje.id_usuario as id_usuario, t_usuario.nombre as nombre_usuario, t_usuario.imagen as imagen_usuario');
    $this->db->join('t_proyecto', 't_mensaje.id_proyecto=t_proyecto.id', 'left');
    $this->db->join('t_usuario', 't_mensaje.id_usuario=t_usuario.id', 'left');
    $this->db->where('t_mensaje.id_usuario_receptor', $id_usuario_receptor);
    $this->db->where('t_mensaje.id_usuario_envia', $id_usuario_envia);
    $this->db->where('t_mensaje.id_proyecto', $id_proyecto);
    $this->db->or_where('t_mensaje.id_usuario_receptor',$id_usuario_envia);
    $this->db->where('t_mensaje.id_usuario_envia', $id_usuario_receptor);
    $this->db->where('t_mensaje.id_proyecto', $id_proyecto);


    $query= $this->db->get('t_mensaje');
        if($query->num_rows()>0){
            return $query->result();
            }else{
            return false;
            }
    }
  #***********************************************************************************
    public function actualizar_mensaje_leido ($id_usuario_envia, $id_status_mensaje){
        $data = array('id_status_mensaje' =>$id_status_mensaje);
        $this->db->where('id_usuario_envia', $id_usuario_envia);
        $this->db->update('t_mensaje', $data);
    }
   #***********************************************************************************

}