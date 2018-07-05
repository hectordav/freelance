<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Principal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
			$this->load->model('proyecto_model');
			$this->load->model('deposito_garantia_model');
			$this->load->model('usuario_model');
			$this->load->model('retiro_dinero_model');

	}
	public function index(){
		if ($this->session->userdata('logueado')) {
		$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
		$data_panel = array(
			'proyecto_id_usuario_asignado' =>$this->proyecto_model->get_proyecto_id_usuario_asignado($data['id_usuario']),
			'contar_mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($data['id_usuario']),
			'contar_propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($data['id_usuario']),
			'contar_proyectos'=>$this->proyecto_model->buscar_proyecto_id_usuario($data['id_usuario']),
			'sumar_dinero'=>$this->deposito_garantia_model->sum_deposito_garantia($data['id_usuario']),
			'mensaje' =>$this->mensaje_model->get_mensaje_recibido($data['id_usuario']),
			'propuesta_2' =>$this->propuesta_model->get_propuesta($data['id_usuario']),
			'contar_proyectos_todos' =>$this->proyecto_model->contar_proyectos_publicados(),
			'contar_usuario' =>$this->usuario_model->contar_usuarios_registrados(),
			'contar_usuario_linea' =>$this->usuario_model->contar_usuarios_linea(),
			'contar_retiro_dinero' =>$this->retiro_dinero_model->contar_retiro_dinero(),
			'sumar_dinero_todo' =>$this->deposito_garantia_model->sum_deposito_garantia_todo(),
			'ultimos_proyectos' =>$this->proyecto_model->carga_proyecto_panel_control());
		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2 ) {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_categoria');
		$crud->set_subject('categoria');
		$crud->required_fields('descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
		$this->load->view('../../assets/inc/menu_superior',$data);
		$this->load->view('../../assets/inc/central',$data_panel);
		$this->load->view('../../assets/inc/footer_common');
		}
		if ($data['id_tipo_usuario']==3 ) {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_categoria');
		$crud->set_subject('categoria');
		$crud->required_fields('descripcion');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('../../assets/inc/menu_lateral',$data);
		$this->load->view('../../assets/inc/menu_superior',$data);
		$this->load->view('../../assets/inc/central_administrador',$data_panel);
		$this->load->view('../../assets/inc/footer_common');
		}

		}else{
			redirect('login');
		}
	}
}

/*'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
						'propuesta'=>$this->propuesta_model->buscar_mensaje_id_usuario($this->session->userdata('id'))*/