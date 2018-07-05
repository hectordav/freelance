<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyecto extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('categoria_model');
			$this->load->model('sub_categoria_model');
			$this->load->model('rango_model');
			$this->load->model('disponibilidad_model');
			$this->load->model('proyecto_model');
			$this->load->model('plazo_proyecto_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
			$this->load->model('pais_model');
	}
	public function index(){
		redirect('proyecto/grilla');
	}
	public function grilla(){
	if ($this->session->userdata('logueado')){
			try {
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_proyecto');
			$crud->set_subject('Proyecto');
			$crud->set_language('spanish');
			$crud->where('id_usuario_remitente',$data_usuario['id_usuario']);
			$crud->set_relation('id_sub_categoria','t_sub_categoria','descripcion');
			$crud->set_relation('id_tipo_proyecto','t_tipo_proyecto','descripcion');
			$crud->set_relation('id_usuario_remitente','t_usuario','nombre');
			$crud->set_relation('id_status','t_status','descripcion');
			$crud->set_relation('id_rango_precio','t_rango_precio','descripcion');
			$crud->set_relation('id_disponibilidad','t_disponibilidad','descripcion');
			$crud->set_relation('id_estado_desarrollo','t_estado_desarrollo','descripcion');
			$crud->set_relation('id_proyecto_o_posicion','t_proyecto_o_posicion','descripcion');
			$crud->set_relation('id_plazo_entrega','t_plazo_entrega','descripcion');
			$crud->display_as('id_sub_categoria','Sub Cat');
			$crud->display_as('id_tipo_proyecto','T. Proyecto');
			$crud->display_as('id_status','Status');
			$crud->display_as('id_usuario_remitente','Usuario');
			$crud->display_as('id_rango_precio','Rango');
			$crud->display_as('id_disponibilidad','Disponibilidad');
			$crud->display_as('id_estado_desarrollo','Desarrollo');
			$crud->display_as('id_proyecto_o_posicion','Proyecto');
			$crud->display_as('titulo','Titulo');
			$crud->display_as('f_publicacion','Inicio');
			$crud->display_as('f_vencimiento','Vence');
			$crud->display_as('archivo','Archivo');
			$crud->required_fields('id_sub_categoria','id_tipo_proyecto','id_status','id_usuario_remitente','id_rango_precio','id_disponibilidad','id_estado_desarrollo','id_proyecto_o_posicion','titulo','f_publicacion','f_vencimiento','archivo');
			$crud->columns('id_sub_categoria','id_tipo_proyecto','id_status','id_rango_precio','id_disponibilidad','id_estado_desarrollo','id_proyecto_o_posicion','titulo','f_publicacion','f_vencimiento');
			$crud->add_action('Ver Proyecto', '', '','fa fa-eye',array($this,'id_primaria'));
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
			$crud->unset_delete();
			$crud->unset_read();
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add')
			{
			redirect('proyecto/add');
			}
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('proyecto/proyecto',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
			$crud->unset_read();
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add')
			{
			redirect('proyecto/add');
			}
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('proyecto/proyecto',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
		}

		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
	public function proyecto_trabajado(){
	if ($this->session->userdata('logueado')){
			try {
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_proyecto');
			$crud->set_subject('Proyecto');
			$crud->set_language('spanish');
			 $crud->where('id_usuario_asignado',$data_usuario['id_usuario']);
			$crud->set_relation('id_sub_categoria','t_sub_categoria','descripcion');
			$crud->set_relation('id_tipo_proyecto','t_tipo_proyecto','descripcion');
			$crud->set_relation('id_usuario_remitente','t_usuario','nombre');
			$crud->set_relation('id_status','t_status','descripcion');
			$crud->set_relation('id_rango_precio','t_rango_precio','descripcion');
			$crud->set_relation('id_disponibilidad','t_disponibilidad','descripcion');
			$crud->set_relation('id_estado_desarrollo','t_estado_desarrollo','descripcion');
			$crud->set_relation('id_proyecto_o_posicion','t_proyecto_o_posicion','descripcion');
			$crud->set_relation('id_plazo_entrega','t_plazo_entrega','descripcion');
			$crud->display_as('id_sub_categoria','Sub Cat');
			$crud->display_as('id_tipo_proyecto','T. Proyecto');
			$crud->display_as('id_status','Status');
			$crud->display_as('id_usuario_remitente','Usuario');
			$crud->display_as('id_rango_precio','Rango');
			$crud->display_as('id_disponibilidad','Disponibilidad');
			$crud->display_as('id_estado_desarrollo','Desarrollo');
			$crud->display_as('id_proyecto_o_posicion','Proyecto');
			$crud->display_as('titulo','Titulo');
			$crud->display_as('f_publicacion','Inicio');
			$crud->display_as('f_vencimiento','Vence');
			$crud->display_as('archivo','Archivo');
			$crud->required_fields('id_sub_categoria','id_tipo_proyecto','id_status','id_usuario_remitente','id_rango_precio','id_disponibilidad','id_estado_desarrollo','id_proyecto_o_posicion','titulo','f_publicacion','f_vencimiento','archivo');
			$crud->columns('id_sub_categoria','id_tipo_proyecto','id_status','id_rango_precio','id_disponibilidad','id_estado_desarrollo','id_proyecto_o_posicion','titulo','f_publicacion','f_vencimiento');
			$crud->add_action('Ver Proyecto', '', '','fa fa-eye',array($this,'id_primaria'));
			$crud->unset_delete();
			$crud->unset_read();
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add')
			{
			redirect('proyecto/add');
			}
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('proyecto/proyecto',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('proyecto/proyecto',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
		}

		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
		public function add(){
			if ($this->session->userdata('logueado')){
				try {
					$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_proyecto');
				$crud->set_subject('proyecto');
				$crud->set_language('spanish');
				$output = $crud->render();
				$data = array('categoria' =>$this->categoria_model->get_categoria(),
				'rango'=>$this->rango_model->get_rango(),
				'disponibilidad'=>$this->disponibilidad_model->get_disponibilidad(),
				'pais'=>$this->pais_model->get_pais());
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
		$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/add',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/add',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}

				} catch (Exception $e) {
				}
				}else{
				redirect('login');
				}
	}
	public function fill_categoria() {
		if ($this->session->userdata('logueado')){
			$id_categoria = $this->input->post('id_categoria');
		if($id_categoria){
            $sub_cat = $this->sub_categoria_model->get_sub_categoria($id_categoria);
             echo '<option data-tokens=""value="">Seleccione una Sub Categoria</option>';

            foreach($sub_cat as $fila){
                echo '<option data-tokens="'. $fila->id .''. $fila->descripcion.'" value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
           echo '<option data-tokens="0" value="0">Sin resultados</option>';
        }
			}else{
			redirect('login');
			}
    }
    public function guardar_proyecto(){
    	if ($this->session->userdata('logueado')){
    		$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_proyecto');
				$crud->set_subject('proyecto');
				$crud->set_language('spanish');
				$output = $crud->render();
				$id_sub_categoria=$this->input->post('id_sub_cat');
				$id_usuario=$data_usuario['id_usuario'];
				$id_tipo_proyecto=$this->input->post('opciones_2');
				$id_status=4;
				$id_rango_precio=$this->input->post('id_presupuesto');
				$id_disponibilidad=$this->input->post('id_disponibilidad');
				$id_estado_desarrollo=$this->input->post('opciones_3');
				$id_proyecto_o_posicion=$this->input->post('opciones');
				$titulo=$this->input->post('txt_titulo_proyecto');
				$id_ciudad=$this->input->post('id_ciudad');
				$guardar=$this->proyecto_model->guardar_proyecto($id_sub_categoria, $id_usuario, $id_tipo_proyecto, $id_status, $id_rango_precio, $id_disponibilidad, $id_estado_desarrollo, $id_proyecto_o_posicion,$titulo,$id_ciudad);
				$id_proyecto=$this->proyecto_model->get_max_proyecto();
				if ($guardar=true) {
				foreach ($id_proyecto->result() as $data) {
				$id =$data->id;
				}
				$data_proyecto = array(
				'id' =>$id,
				'plazo' =>$this->plazo_proyecto_model->get_plazo_proyecto()
				);
		if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/edit_det_proyecto',$data_proyecto);
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/edit_det_proyecto',$data_proyecto);
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}

				}else{
				redirect('proyecto/grilla');
				}
				}else{
				redirect('login');
				}
    }
    public function guardar_det_proyecto(){
    	if ($this->session->userdata('logueado')){
    		$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_proyecto');
				$crud->set_subject('proyecto');
				$crud->set_language('spanish');
				$output = $crud->render();
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
				    'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
				  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));

				$mi_archivo = 'mi_archivo';
				$config['upload_path'] = "uploads/";
				$config['allowed_types'] = '*';
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->load->library('upload', $config);
				#si existe el archivo, lo sube.
				if ($this->upload->do_upload($mi_archivo)) {
				$data= $this->upload->data();
				$archivo=$data['file_name'];
				$id_proyecto=$this->input->post('id_proyecto');
				$plazo_entrega=$this->input->post('id_plazo');
				$det_proyecto=$this->input->post('txt_det_proyecto');
				$fecha_inicio=date('Y-m-d');
				$fecha_fin=strtotime('+30 day',strtotime($fecha_inicio));
				$fecha_fin=date('Y-m-d',$fecha_fin);
				$id_status=1;
				$this->proyecto_model->guardar_det_proyecto($id_proyecto,$det_proyecto);
				$this->proyecto_model->actualizar_proyecto($id_proyecto, $plazo_entrega, $fecha_inicio, $fecha_fin,$archivo,$id_status);
		if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
		$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/exito_proyecto');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/exito_proyecto');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}

				}else{
				$archivo=null;
				$id_status=1;
				$id_proyecto=$this->input->post('id_proyecto');
				$plazo_entrega=$this->input->post('id_plazo');
				$det_proyecto=$this->input->post('txt_det_proyecto');
				$fecha_inicio=date('Y-m-d');
				$fecha_fin=strtotime('+30 day',strtotime($fecha_inicio));
				$fecha_fin=date('Y-m-d',$fecha_fin);
				$this->proyecto_model->guardar_det_proyecto($id_proyecto,$det_proyecto);
				$this->proyecto_model->actualizar_proyecto($id_proyecto, $plazo_entrega, $fecha_inicio, $fecha_fin,$archivo,$id_status);
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
		$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/exito_proyecto');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('proyecto/exito_proyecto');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}

				}
				}else{
				redirect('login');
				}
    }
    function id_primaria($primary_key , $row){
    	if ($this->session->userdata('logueado')){
				return site_url('proyecto/ver_proyecto').'/'.$row->id;
				}else{
				redirect('login');
				}
	}
    public function ver_proyecto(){
    	if ($this->session->userdata('logueado')){
    		$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$id_proyecto  = $this->session->flashdata('id_proyecto');
				if ($id_proyecto==null){
				$id_proyecto = $this->uri->segment(3);
				}
				if ($id_proyecto==null) {
				redirect('proyecto/grilla');
				}
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_proyecto');
				$crud->set_subject('proyecto');
				$crud->set_language('spanish');
				$output= $crud->render();
				$data['proyecto'] =$this->proyecto_model->get_proyecto_id($id_proyecto);
				if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_propuesta');
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('modal/modal_nuevo_mensaje',$data);
				$this->load->view('modal/modal_email',$data);
				$this->load->view('modal/modal_nueva_propuesta');
				$this->load->view('proyecto/ver_proyecto',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);
				}
				if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_propuesta');
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('modal/modal_nuevo_mensaje',$data);
				$this->load->view('modal/modal_email',$data);
				$this->load->view('modal/modal_nueva_propuesta');
				$this->load->view('proyecto/ver_proyecto',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);
				}

				}else{
					#esta tomando el dato del segment para enviarlo como flashdata
				$id_proyecto = $this->uri->segment(3);
				$this->session->set_flashdata('id_proyecto', $id_proyecto);
				redirect('proyecto/ver_proyecto_slg');
				}
    }
    public function cargar_proyecto_todos(){
    	if ($this->session->userdata('logueado')){
    	$data = array('respuesta' =>$this->proyecto_model->primera_carga_proyecto_general(),
    	'categoria' =>$this->categoria_model->get_categoria(),
    	'pais' =>$this->pais_model->get_pais(),
    	'contar_proyecto'=>$this->proyecto_model->contar_proyectos_publicados());
    	$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_proyecto');
		$crud->set_subject('proyecto');
		$crud->set_language('spanish');
		$output= $crud->render();
		if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('proyecto/ver_todos_proyectos', $data);
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
		$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
		$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('proyecto/ver_todos_proyectos', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}

	}else{
	redirect('proyecto/cargar_proyecto_todos_slg');
	}
    }
    public function loadMore(){
        sleep(0);
        if($this->input->is_ajax_request())
        {
            $nuevos_datos = $this->proyecto_model->cargar_mas($this->input->post("lastId"));
            if($nuevos_datos !== FALSE){
                echo json_encode(array("res" => "success", "proyectos" => $nuevos_datos));
            }else{
                echo json_encode(array("res" => "empty"));
            }
        }
    }
    public function loadMore_sub_cat(){
        sleep(0);
        if($this->input->is_ajax_request())
        {
            $nuevos_datos = $this->proyecto_model->cargar_mas($this->input->post("lastId"));
            if($nuevos_datos !== FALSE){
                echo json_encode(array("res" => "success", "proyectos" => $nuevos_datos));
            }else{
                echo json_encode(array("res" => "empty"));
            }
        }
    }
  public function buscar_proyectos(){
    	if ($this->session->userdata('logueado')){
    	$id_sub_cat=$this->input->post('id_sub_cat');
    	$data = array('respuesta' =>$this->proyecto_model->primera_carga_proyecto_sub_categoria($id_sub_cat),
    	'categoria' =>$this->categoria_model->get_categoria(),
    	'pais' =>$this->pais_model->get_pais());
    	$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
				  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')),
					  'sub_categoria'=>$id_sub_cat);

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_proyecto');
		$crud->set_subject('proyecto');
		$crud->set_language('spanish');
		$output= $crud->render();
if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
		$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
		$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('proyecto/ver_todos_proyectos_buscar', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
		$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
		$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('proyecto/ver_todos_proyectos_buscar', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}


	}else{
		redirect('login');
	}
    }
    public function buscar_proyectos_x_pais(){
    	if ($this->session->userdata('logueado')){
    	$id_ciudad=$this->input->post('id_ciudad');
    	$data = array('respuesta' =>$this->proyecto_model->primera_carga_proyecto_x_ciudad($id_ciudad),
    	'categoria' =>$this->categoria_model->get_categoria(),
    	'pais' =>$this->pais_model->get_pais());
    	$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
				  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_proyecto');
		$crud->set_subject('proyecto');
		$crud->set_language('spanish');
		$output= $crud->render();
if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
		$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
		$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('proyecto/ver_todos_proyectos_buscar', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
		$this->load->view('../../assets/script/script_mostrar_ocultar_combo_proyectos.php');
		$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('proyecto/ver_todos_proyectos_buscar', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
		}


	}else{
		redirect('login');
	}
    }
    public function ver_proyecto_slg(){
    	$id_proyecto  = $this->session->flashdata('id_proyecto');
				if ($id_proyecto==null){
				$id_proyecto = $this->uri->segment(3);
				}
				if ($id_proyecto==null) {
				redirect('proyecto/grilla');
				}
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_proyecto');
				$crud->set_subject('proyecto');
				$crud->set_language('spanish');
				$output= $crud->render();
				$data['proyecto'] =$this->proyecto_model->get_proyecto_id($id_proyecto);
				$data['id_usuario']=0;

				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/script/script_propuesta');
			#	$this->load->view('../../assets/inc/menu_lateral_sin_loguearse');
				$this->load->view('../../assets/inc/menu_superior_sin_loguearse');
			#	$this->load->view('modal/modal_email',$data);
			#	$this->load->view('modal/modal_nueva_propuesta');
				$this->load->view('proyecto/ver_proyecto',$data);
				$this->load->view('../../assets/inc/footer_common_add',$output);
    }

    public function cargar_proyecto_todos_slg(){
    	$data = array('respuesta' =>$this->proyecto_model->primera_carga_proyecto_general(),
    	'categoria' =>$this->categoria_model->get_categoria(),
    	'id_usuario' =>0);
    	$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_proyecto');
		$crud->set_subject('proyecto');
		$crud->set_language('spanish');
		$output= $crud->render();
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
	#	$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior_sin_loguearse');
		$this->load->view('proyecto/ver_todos_proyectos', $data);
		$this->load->view('../../assets/inc/footer_common_add',$output);
    }
    public function enviar_mail(){

		$config = Array(
	'IsSMTP'=>true,
	'useragent'=>'Codeigniter',
    'protocol' => 'sendmail',
    'smtp_host' => 'smtp.1and1.es',
    'smtp_port' =>  '587',
    'smtp_timeout'=>'10',
    'smtp_user' => 'publicaciones@freelance-employ.com',
    'smtp_pass' => 'aguamineral1234__',
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'smtp_crypto'=>'tls',
    'wordwrap'=>true,
    'wrapchars'=>76,
    'validate'=>true,
    'crlf'=>'\r\n',
    'newline'=>'\r\n',
    'bcc_batch_mode'=>false,
    'bcc_batch_size'=>200,
    'smtp_secure'=>'tls'
	);
	$id_proyecto=$this->input->post('txt_id_proyecto');
	$destinatario=$this->input->post('txt_remitente');
	$mensaje=$this->input->post('txt_mensaje');
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$this->email->subject('Proyecto Publicado # '.$id_proyecto.' ');
	$direccion=base_url();
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje.'<br><a href="'.base_url().'proyecto/ver_proyecto/'.$id_proyecto .'"><img src="https://pdgbgg-ch3302.files.1drv.com/y3mRREBSZGEZw5leCdooVSP1wvfaj7xEK5z-2UXs3bfhsao7xbkEvsX_hqpKRu2Pa7UFqhCf79nh3DaavZ1ZSmOELmJcKzCV7ZfzgifWIjYQ-5N-gsioPR95KN8gfdgK7CzU_VuHu9hMZp9nVvtacs9dd0qCfX_mJ_KXnPa8lc85L4?width=138&height=46&cropmode=none" width="138" height="46" /></a>');
	//    $this->email->set_alt_message('Tu correo no recibe HTML');
	$result = $this->email->send();
	$this->session->set_flashdata('id_proyecto', $id_proyecto);
	redirect('proyecto/ver_proyecto');

	}

}
