<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Preferencia extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('categoria_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');

	}
	public function index()
	{
		redirect('preferencia/grilla');
	}
	public function grilla(){
		if ($this->session->userdata('logueado')){
			try {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_preferencia');
				$crud->set_subject('Preferencias');
				$crud->set_language('spanish');
				$crud->where('id_usuario',$data['id_usuario']);
				$crud->set_relation('id_sub_categoria','t_sub_categoria','descripcion');
				$crud->display_as('id_sub_categoria','Sub Categoria');
				#$crud->required_fields('id_sub_categoria');
				$crud->unset_columns('id_usuario');
				$crud->unset_read();
				$crud->unset_edit();

				$output = $crud->render();
				$state = $crud->getState();

					if($state == 'add')
					{
					redirect('preferencia/add');
					}
if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('preferencia/preferencia',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('preferencia/preferencia',$output );
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
				$data = array('categoria' =>$this->categoria_model->get_categoria());
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('preferencia/add',$data);
			$this->load->view('../../assets/inc/footer_common_add',$output);
				} catch (Exception $e) {
				}
				}else{
				redirect('login');
				}
	}
	public function guardar_preferencia(){
			if ($this->session->userdata('logueado')){
				try {
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
				  'nombre_usuario'=>$this->session->userdata('nombre'),
				  'id_perfil'=>$this->session->userdata('id_perfil'),
				  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
				  'imagen'=>$this->session->userdata('imagen'));
				$id_sub_cat=$this->input->post('id_sub_cat');
				$this->preferencia_model->guardar_preferencia($data_usuario['id_usuario'],$id_sub_cat);
				redirect('preferencia/grilla');
				} catch (Exception $e) {
				}
				}else{
				redirect('login');
				}
	}
}
