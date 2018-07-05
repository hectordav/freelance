<?php
class Usuario_model extends CI_Model{
    //put your code here
 #*******************************************************************************
    public function guardar_usuario($id_perfil,$id_tipo_usuario,$id_plan,$id_pais, $id_ciudad, $id_moneda, $nombre,$ocupacion,$direccion,$telf,$login,$clave,$sobre_mi,$imagen,$fecha_registro,$num_propuesta,$suscribirse,$id_status_usuario, $costo_hora){
      $data = array(
        'id_perfil' =>$id_perfil ,
        'id_tipo_usuario'=>$id_tipo_usuario ,
        'id_plan'=>$id_plan,
        'id_status_usuario'=>$id_status_usuario,
        'cod_pais'=>$id_pais,
        'id_ciudad'=>$id_ciudad,
        'id_tipo_moneda'=> $id_moneda,
        'nombre'=>$nombre,
        'direccion'=>$direccion,
        'telf'=>$telf,
        'ocupacion'=>$ocupacion,
        'login'=>$login,
        'clave'=>$clave,
        'sobre_mi'=>$sobre_mi,
        'imagen'=>$imagen,
        'fecha'=>$fecha_registro,
        'num_propuesta'=>$num_propuesta,
        'precio_hora'=>$costo_hora,
        'suscripcion_boletines'=>$suscribirse
        );
      $this->db->insert('t_usuario', $data);
    }
    public function guardar_usuario_facebook($id_perfil,$id_tipo_usuario,$id_plan,$id_pais,$nombre,$ocupacion,$direccion,$telf,$login,$clave,$sobre_mi,$imagen,$num_propuesta){
      $fecha_registro=date('Y-m-d');
      $data = array(
        'id' =>$clave,
        'id_perfil' =>$id_perfil ,
        'id_tipo_usuario'=>$id_tipo_usuario ,
        'id_plan'=>$id_plan,
        'cod_pais'=>$id_pais,
        'nombre'=>$nombre,
        'direccion'=>$direccion,
        'telf'=>$telf,
            'ocupacion'=>$ocupacion,
        'login'=>$login,
        'clave'=>$clave,
        'sobre_mi'=>$sobre_mi,
        'imagen'=>$imagen,
        'fecha'=>$fecha_registro,
        'num_propuesta'=>$num_propuesta
        );
      $this->db->insert('t_usuario', $data);
    }
     public function buscar_login($login){
      $this->db->where('login', $login);
      $usuario=$this->db->get('t_usuario');
     if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }
    public function buscar_id(){
      $usuario=$this->db->get('t_usuario');
     if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }
    public function buscar_login_facebook($login, $id_facebook){
      $this->db->where('login', $login);
      $this->db->where('id', $id_facebook);
      $usuario=$this->db->get('t_usuario');
     if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }
    public function contar_usuarios_registrados(){
            $this->db->from('t_usuario');
            return $this->db->count_all_results();
        }
        public function contar_usuarios_linea(){
          $this->db->where('id_status_usuario', 2);
            $this->db->from('t_usuario');
            return $this->db->count_all_results();
        }
    public function get_usuario_id($id_usuario){
      $this->db->select('t_usuario.id as id_usuario, t_usuario.nombre as nombre_usuario, t_usuario.direccion as direccion_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.telf as telf_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.sobre_mi as usuario_sobre_mi,t_usuario.puntaje as usuario_puntaje, t_usuario.imagen as usuario_imagen, t_tipo_usuario.descripcion as tipo_usuario,t_usuario.num_propuesta as usuario_num_propuesta, t_usuario.login as usuario_login, t_usuario.precio_hora as precio_hora,t_tipo_moneda.simbolo as simbolo_moneda, t_perfil.puntaje_menor as puntaje_menor_perfil,t_perfil.puntaje_mayor as puntaje_mayor_perfil, t_ciudad.ciudad as ciudad_usuario, t_pais_usuario.pais as pais_usuario');
      $this->db->join('t_perfil', 't_usuario.id_perfil = t_perfil.id', 'left');
      $this->db->join('t_tipo_usuario', 't_usuario.id_tipo_usuario = t_tipo_usuario.id', 'left');
      $this->db->join('t_plan', 't_usuario.id_plan = t_plan.id', 'left');
      $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
      $this->db->join('t_ciudad', 't_usuario.id_ciudad = t_ciudad.id', 'left');
      $this->db->join('t_tipo_moneda', 't_usuario.id_tipo_moneda = t_tipo_moneda.id', 'left');
      $this->db->where('t_usuario.id', $id_usuario);
      $usuario=$this->db->get('t_usuario');
        if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }
    public function get_usuario_invitacion($id_pais, $id_ciudad, $id_categoria, $id_sub_cat){
      $this->db->select('t_usuario.id as id_usuario, t_usuario.nombre as nombre_usuario, t_usuario.direccion as direccion_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.telf as telf_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.sobre_mi as usuario_sobre_mi,t_usuario.puntaje as usuario_puntaje, t_usuario.imagen as usuario_imagen, t_tipo_usuario.descripcion as tipo_usuario,t_usuario.num_propuesta as usuario_num_propuesta, t_usuario.login as usuario_login,t_perfil.puntaje_menor as puntaje_menor_perfil,t_perfil.puntaje_mayor as puntaje_mayor_perfil, t_ciudad.ciudad as ciudad_usuario, t_pais_usuario.pais as pais_usuario');
      $this->db->join('t_perfil', 't_usuario.id_perfil = t_perfil.id', 'left');
      $this->db->join('t_tipo_usuario', 't_usuario.id_tipo_usuario = t_tipo_usuario.id', 'left');
      $this->db->join('t_plan', 't_usuario.id_plan = t_plan.id', 'left');
      $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
      $this->db->join('t_ciudad', 't_usuario.id_ciudad = t_ciudad.id', 'left');
       $this->db->join('t_preferencia', 't_preferencia.id_usuario = t_usuario.id', 'left');
      $this->db->where('t_usuario.cod_pais', $id_pais);
      $this->db->where('t_usuario.id_ciudad', $id_ciudad);
      $this->db->where('t_preferencia.id_sub_categoria', $id_sub_cat);
      $usuario=$this->db->get('t_usuario');
        if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }
    public function get_usuario_boletin(){
      $this->db->select('t_usuario.id as id_usuario, t_usuario.nombre as nombre_usuario, t_usuario.direccion as direccion_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.telf as telf_usuario, t_usuario.ocupacion as ocupacion_usuario, t_usuario.sobre_mi as usuario_sobre_mi,t_usuario.puntaje as usuario_puntaje, t_usuario.imagen as usuario_imagen, t_tipo_usuario.descripcion as tipo_usuario,t_usuario.num_propuesta as usuario_num_propuesta, t_usuario.login as usuario_login,t_perfil.puntaje_menor as puntaje_menor_perfil,t_perfil.puntaje_mayor as puntaje_mayor_perfil, t_pais_usuario.pais as pais_usuario');
      $this->db->join('t_perfil', 't_usuario.id_perfil = t_perfil.id', 'left');
      $this->db->join('t_tipo_usuario', 't_usuario.id_tipo_usuario = t_tipo_usuario.id', 'left');
      $this->db->join('t_plan', 't_usuario.id_plan = t_plan.id', 'left');
      $this->db->join('t_pais_usuario', 't_usuario.cod_pais = t_pais_usuario.cod', 'left');
      $this->db->where('t_usuario.suscripcion_boletines',1);
      $usuario=$this->db->get('t_usuario');
        if ($usuario->num_rows()>0) {
        return $usuario;
        }else{
        return false;
        }
    }

    public function guardar_det_usuario($id_usuario, $id_habilidad){
        $data = array('id_usuario' =>$id_usuario,
        'id_habilidades'=>$id_habilidad);
        $this->db->insert('t_det_usuario', $data);
    }
    public function guardar_det_usuario_idioma($id_usuario, $id_idioma){
        $data = array('id_usuario' =>$id_usuario,
        'id_det_idioma'=>$id_idioma);
        $this->db->insert('t_det_usuario', $data);
    }
    public function get_det_usuario_id($id_usuario){
        $this->db->select('t_habilidad.descripcion as usuario_habilidad,t_habilidad.porcentaje as usuario_porcentaje_habilidad');
         $this->db->join('t_habilidad', 't_det_usuario.id_habilidades = t_habilidad.id', 'left');
        $this->db->where('t_det_usuario.id_usuario', $id_usuario);
        $det_usuario=$this->db->get('t_det_usuario');
        if ($det_usuario->num_rows()>0) {
        return $det_usuario;
        }else{
        return false;
        }
    }
    public function get_det_idioma_id($id_usuario){
        $this->db->select('t_idioma.descripcion as usuario_idioma,t_det_idioma.porcentaje as usuario_porcentaje_idioma');
         $this->db->join('t_idioma', 't_det_idioma.id_idioma = t_idioma.id', 'left');
        $this->db->where('t_det_idioma.id_usuario', $id_usuario);
        $det_usuario=$this->db->get('t_det_idioma');
        if ($det_usuario->num_rows()>0) {
        return $det_usuario;
        }else{
        return false;
        }
    }
    public function get_det_idioma_proyecto($id_usuario){
        $this->db->select('t_idioma.descripcion as usuario_idioma');
         $this->db->join('t_idioma', 't_det_idioma_proyecto.id_idioma = t_idioma.id', 'left');
        $this->db->where('t_det_idioma_proyecto.id_usuario', $id_usuario);
        $det_usuario=$this->db->get('t_det_idioma_proyecto');
        if ($det_usuario->num_rows()>0) {
        return $det_usuario;
        }else{
        return false;
        }
    }
    public function actualizar_usuario_imagen($id_usuario, $archivo){
        $data = array('imagen' =>$archivo);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
    public function actualizar_usuario_contra($id_usuario, $clave){
        $data = array('clave' =>$clave);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
    public function actualizar_usuario_propuesta($id_usuario, $propuesta){
        $data = array('num_propuesta' =>$propuesta);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
    public function actualizar_usuario_puntaje($id_usuario, $puntaje){
        $data = array('puntaje' =>$puntaje);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
     public function actualizar_usuario_perfil($id_usuario,$id_pais, $id_ciudad, $id_moneda, $id_tipo_usuario ,$nombre ,$ocupacion ,$direccion ,$telf,$costo_hora){
        $data = array('id_tipo_usuario' =>$id_tipo_usuario,
                      'cod_pais' =>$id_pais,
                      'id_ciudad'=>$id_ciudad,
                      'id_tipo_moneda'=>$id_moneda,
                      'nombre' =>$nombre,
                      'direccion' =>$direccion,
                      'telf' =>$telf,
                      'ocupacion'=>$ocupacion,
                      'precio_hora'=>$costo_hora);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
    public function actualizar_usuario_status($id_usuario,$id_status_usuario){
        $data = array('id_status_usuario' =>$id_status_usuario);
        $this->db->where('id', $id_usuario);
        $this->db->update('t_usuario', $data);
    }
    public function actualizar_usuario_boletin($id_login,$boletin){
        $data = array('suscripcion_boletines' =>$boletin);
        $this->db->where('id', $id_login);
        $this->db->update('t_usuario', $data);
    }
    public function login($login, $clave){
      $this->db->select('id, id_perfil, nombre, login, imagen, id_tipo_usuario');
      $this->db->from('t_usuario');
      $this->db->where('login', $login);
      $this->db->where('clave', $clave);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
    }
     public function login_facebook($login){
      $this->db->select('id, id_perfil, nombre, login, imagen, id_tipo_usuario');
      $this->db->from('t_usuario');
      $this->db->where('login', $login);

      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
    }
#*******************************************************************************
}