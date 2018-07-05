<?php class Proyecto_model extends CI_Model{
    //put your code here

 #*******************************************************************************
    public function get_proyecto() {
        $proyecto=$this->db->get('t_proyecto');
    if ($proyecto->num_rows()>0) {
            return $proyecto;
            }else{
                return false;
            }
        }

#*******************************************************************************

 	public function guardar_proyecto($id_sub_categoria,$id_usuario,$id_tipo_proyecto,$id_status,$id_rango_precio,$id_disponibilidad,$id_estado_desarrollo,$id_proyecto_o_posicion,$titulo, $id_ciudad){
 		$data = array(
 			'id_sub_categoria' =>$id_sub_categoria,
            'id_usuario_remitente'=>$id_usuario,
 			'id_tipo_proyecto' =>$id_tipo_proyecto,
 			'id_status' =>$id_status,
 			'id_rango_precio' =>$id_rango_precio,
 			'id_disponibilidad' =>$id_disponibilidad,
 			'id_estado_desarrollo' =>$id_estado_desarrollo,
 			'id_proyecto_o_posicion' =>$id_proyecto_o_posicion,
 			'titulo' =>$titulo,
            'id_ciudad'=>$id_ciudad
 		 );
 		$this->db->insert('t_proyecto', $data);

 	}
    public function actualizar_proyecto($id_proyecto, $id_plazo_entrega, $fecha_inicio, $fecha_fin,$archivo,$id_status){
        $data = array(
            'id_status'=>$id_status,
            'id_plazo_entrega' =>$id_plazo_entrega,
            'f_publicacion'=>$fecha_inicio,
            'f_vencimiento'=>$fecha_fin,
            'archivo'=>$archivo

            );
        $this->db->where('id', $id_proyecto);
        $this->db->update('t_proyecto', $data);
    }
    public function guardar_det_proyecto($id_proyecto,$det_proyecto){
        $data = array(
            'id_proyecto' =>$id_proyecto,
            'descripcion' =>$det_proyecto
         );
        $this->db->insert('t_det_proyecto', $data);
    }

 	public function get_max_proyecto() {
      $this->db->select_max('id');
      $proyecto=$this->db->get('t_proyecto');
	    if ($proyecto->num_rows()>0) {
	        return $proyecto;
	        }else{
	        return false;
	        }
    }
     public function buscar_proyecto_id_usuario($id_usuario){
            $this->db->from('t_proyecto');
            $this->db->where('id_usuario_remitente',$id_usuario);
            return $this->db->count_all_results();
    }
    public function contar_proyectos_publicados(){
            $fecha=date('Y-m-d');
            $this->db->from('t_proyecto');
            $this->db->where('f_vencimiento >=',$fecha);
            $this->db->where('id_status','1');
            return $this->db->count_all_results();
    }
  public function get_proyecto_id($id_proyecto){
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
     $this->db->where('t_proyecto.id', $id_proyecto);
     $proyecto=$this->db->get('t_proyecto');
      if ($proyecto->num_rows()>0) {
          return $proyecto;
          }else{
          return false;
          }
    }
    public function get_proyecto_id_usuario_asignado($id_usuario){
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
     $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
     $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
     $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
     $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
     $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
     $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
     $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
     $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
     $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
     $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
     $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
     $this->db->order_by('t_proyecto.id', 'desc');
     $this->db->where('t_proyecto.id_usuario_asignado', $id_usuario);
     $proyecto=$this->db->get('t_proyecto');
      if ($proyecto->num_rows()>0) {
          return $proyecto;
          }else{
          return false;
          }
    }
     public function get_proyecto_id_usuario_remitente($id_usuario){
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
     $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
     $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
     $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
     $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
     $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
     $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
     $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
     $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
     $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
     $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
     $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
     $this->db->order_by('t_proyecto.id', 'desc');
     $this->db->where('t_proyecto.id_usuario_remitente', $id_usuario);
     $proyecto=$this->db->get('t_proyecto');
      if ($proyecto->num_rows()>0) {
          return $proyecto;
          }else{
          return false;
          }
    }
    public function primera_carga_proyecto_general(){
        $fecha=date('y-m-d');
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
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
    $this->db->order_by('t_proyecto.id', 'desc');
    $this->db->where('t_proyecto.id_status','1');
    $this->db->where('t_proyecto.f_vencimiento >=',$fecha);
    $proyecto=$this->db->get('t_proyecto',4);
      if($proyecto->num_rows()>0){
        return $proyecto->result();
      }
      return FALSE;
      }
      public function carga_proyecto_panel_control(){
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
    $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
    $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
    $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
    $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
    $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
    $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
    $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
    $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
    $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
    $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
    $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
    $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
    $this->db->order_by('t_proyecto.id', 'desc');
    $this->db->where('t_proyecto.id_status','1');
    $proyecto=$this->db->get('t_proyecto',20);
      if ($proyecto->num_rows()>0) {
      return $proyecto;
        }else{
        return false;
        }
      }
public function primera_carga_proyecto_x_ciudad($id_ciudad){
        $fecha=date('y-m-d');
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
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
    $this->db->order_by('t_proyecto.id', 'desc');
    $this->db->where('t_proyecto.id_ciudad',$id_ciudad);
    $this->db->where('t_proyecto.id_status','1');
    $this->db->where('t_proyecto.f_vencimiento >=',$fecha);
    $this->db->order_by('t_proyecto.id', 'desc');
    $proyecto=$this->db->get('t_proyecto',6);
      if($proyecto->num_rows()>0){
        return $proyecto->result();
      }
      return FALSE;
  }
      public function primera_carga_proyecto_sub_categoria($id_sub_cat){
    $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
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
    $this->db->order_by('t_proyecto.id', 'desc');
    $this->db->where('t_proyecto.id_sub_categoria',$id_sub_cat);
    $this->db->where('t_proyecto.id_status','1');
    $this->db->order_by('t_proyecto.id', 'desc');
    $proyecto=$this->db->get('t_proyecto',6);
      if($proyecto->num_rows()>0){
        return $proyecto->result();
      }
      return FALSE;
  }
    public function cargar_mas($ultimo){
       $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
      $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
      $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
      $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
      $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
      $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
      $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
      $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
      $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
      $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
      $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
      $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
      $this->db->where('t_proyecto.id <',$ultimo);
      $this->db->where('t_proyecto.id_status','1');
      $this->db->order_by('t_proyecto.id', 'desc');
      $proyecto=$this->db->get('t_proyecto',6);
      if($proyecto->num_rows()>0){
        return $proyecto->result();
      }
      return FALSE;
      }
      public function cargar_mas_sub_cat($ultimo){
       $this->db->select('t_proyecto.id as id_proyecto, t_proyecto.titulo as titulo_proyecto, t_proyecto.f_publicacion as fecha_publicacion_proyecto,t_proyecto.f_vencimiento as fecha_vence_proyecto, t_proyecto.archivo as archivo_proyecto, t_proyecto.f_publicacion as fecha_inicio, t_proyecto.f_vencimiento as fecha_fin, t_proyecto.id_usuario_remitente as id_cliente_receptor, t_det_proyecto.descripcion as descripcion_proyecto, t_sub_categoria.descripcion as sub_cat_proyecto, t_categoria.descripcion as categoria_proyecto,t_usuario.id as cliente_id, t_usuario.nombre as cliente_proyecto, t_pais_usuario.pais as pais_usuario, t_usuario.puntaje as puntos_cliente, t_tipo_proyecto.descripcion as tipo_proyecto, t_status.descripcion as status_proyecto, t_rango_precio.descripcion as rango_precio_proyecto, t_disponibilidad.descripcion as disponibilidad_proyecto, t_estado_desarrollo.descripcion as estado_desarrollo_proyecto, t_proyecto_o_posicion.descripcion as proyecto_o_posicion_proyecto, t_plazo_entrega.descripcion as plazo_entrega');
      $this->db->join('t_sub_categoria', 't_proyecto.id_sub_categoria = t_sub_categoria.id', 'left');
      $this->db->join('t_categoria', 't_sub_categoria.id_categoria = t_categoria.id', 'left');
      $this->db->join('t_usuario', 't_proyecto.id_usuario_remitente = t_usuario.id', 'left');
      $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
      $this->db->join('t_tipo_proyecto', 't_proyecto.id_tipo_proyecto = t_tipo_proyecto.id', 'left');
      $this->db->join('t_status', 't_proyecto.id_status = t_status.id', 'left');
      $this->db->join('t_rango_precio', 't_proyecto.id_rango_precio = t_rango_precio.id', 'left');
      $this->db->join('t_disponibilidad', 't_proyecto.id_disponibilidad = t_disponibilidad.id', 'left');
      $this->db->join('t_estado_desarrollo', 't_proyecto.id_estado_desarrollo = t_estado_desarrollo.id', 'left');
      $this->db->join('t_proyecto_o_posicion', 't_proyecto.id_proyecto_o_posicion = t_proyecto_o_posicion.id', 'left');
      $this->db->join('t_plazo_entrega', 't_proyecto.id_plazo_entrega = t_plazo_entrega.id', 'left');
      $this->db->join('t_det_proyecto', 't_proyecto.id = t_det_proyecto.id_proyecto', 'left');
      $this->db->where('t_proyecto.id <',$ultimo);
      $this->db->where('t_proyecto.id_status','1');
      $this->db->order_by('t_proyecto.id', 'desc');
      $proyecto=$this->db->get('t_proyecto');
      if($proyecto->num_rows()>0){
        return $proyecto->result();
      }
      return FALSE;
      }

    public function actualizar_proyecto_asignar_usuario($id_proyecto, $id_usuario_envia,$id_status){
      $fecha_asignacion_usuario=date('Y-m-d');
      $data = array('id_usuario_asignado' =>$id_usuario_envia,
                    'id_status'=>$id_status,
                    'fecha_asignacion_usuario'=>$fecha_asignacion_usuario);
      $this->db->where('id', $id_proyecto);
      $this->db->update('t_proyecto', $data);
    }
    public function actualizar_proyecto_terminado($id_proyecto){
      $id_status=3;
      $data = array('id_status'=>$id_status);
      $this->db->where('id', $id_proyecto);
      $this->db->update('t_proyecto', $data);
    }

}