<?php
class Buscar_todos_proyecto_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function buscar_todos() {
    $fecha=date('y-m-d');
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_proyecto.fecha_asignacion_usuario as fecha_asignacion_usuario , t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_ciudad.ciudad as ciudad_proyecto, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
     $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
     $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
     $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
     $this->db->join('t_ciudad', 't_proyecto.id_ciudad = t_ciudad.id', 'left');
     $this->db->join('t_pais_usuario', 't_ciudad.cod_pais = t_pais_usuario.cod', 'left');
     $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
     $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
     $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
     $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
     $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
     $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
     $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
     $this->db->where('t_proyecto.f_vencimiento >=', $fecha);
     $this->db->order_by('t_proyecto.id', 'desc');
     $proyecto=$this->db->get('t_proyecto', 10);
      if ($proyecto->num_rows()>0) {
          return $proyecto;
          }else{
          return false;
          }
    }
     public function buscar_todos_proyecto_id($id_proyecto) {
    $fecha=date('y-m-d');
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_proyecto.fecha_asignacion_usuario as fecha_asignacion_usuario , t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_ciudad.ciudad as ciudad_proyecto, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
     $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
     $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
     $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
     $this->db->join('t_ciudad', 't_proyecto.id_ciudad = t_ciudad.id', 'left');
     $this->db->join('t_pais_usuario', 't_ciudad.cod_pais = t_pais_usuario.cod', 'left');
     $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
     $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
     $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
     $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
     $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
     $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
     $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
     $this->db->where('t_proyecto.f_vencimiento >=', $fecha);
      $this->db->where('t_proyecto.id >=', $id_proyecto);
     $this->db->order_by('t_proyecto.id', 'desc');
     $proyecto=$this->db->get('t_proyecto', 10);
      if ($proyecto->num_rows()>0) {
          return $proyecto;
          }else{
          return false;
          }
    }

#*******************************************************************************


}