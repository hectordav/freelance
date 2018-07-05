<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('plan_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');

	}
	public function index()
	{
		redirect('plan/grilla');
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
				$crud->set_table('t_plan');
				$crud->set_subject('Plan');
				$crud->set_language('spanish');
				$crud->display_as('descripcion','Plan');
				$crud->required_fields('descripcion');
				$crud->unset_edit();
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add')
				{
				redirect('plan/add');
				}
		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			redirect('login','refresh');
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('plan/plan',$output );
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
				$crud->set_table('t_plan');
				$crud->set_subject('Plan');
				$crud->set_language('spanish');
				$crud->display_as('descripcion','Plan');
				$crud->required_fields('descripcion');
				$crud->unset_delete();
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('modal/modal_nuevo_plan');
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('plan/add');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		} catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
	public function add_plan(){
		if ($this->session->userdata('logueado')){
			$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$titulo_plan=$this->input->post('txt_titulo_plan');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_plan');
			$crud->set_subject('Plan');
			$crud->set_language('spanish');
			$crud->display_as('descripcion','Plan');
			$crud->required_fields('descripcion');
			$crud->unset_delete();
			$output = $crud->render();
			$this->plan_model->guardar_plan($titulo_plan);
			$data_plan=$this->plan_model->get_max_plan();
			foreach ($data_plan->result() as $data) {
			$id=$data->id;
			}
			$data = array('nuevo_plan' =>$this->plan_model->get_plan($id));
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('plan/add_plan',$data);
			$this->load->view('../../assets/inc/footer_common_add_plan',$output);
			}else{
			redirect('login');
			}
	}
	public function mostrar_det_plan(){
		if ($this->session->userdata('logueado')){
			if($this->input->is_ajax_request()){
			$id_plan= $this->input->post('txt_id_plan');
			if ($datos=$this->plan_model->get_det_plan($id_plan))
			{
			echo json_encode($datos);
			}else{
			$datos=null;
			echo json_encode($datos);
			}
			}
			}else{
			redirect('login');
			}
	}
	public function guardar_det_plan_back(){
		if ($this->session->userdata('logueado')){
				if ($this->input->is_ajax_request()) {
				$id_plan= $this->input->post('txt_id_plan');
				$descripcion=$this->input->post('txt_descripcion');
				$this->plan_model->guardar_det_plan($id_plan,$descripcion);
				}
				}else{
				redirect('login');
				}
	}
	public function eliminar_det_plan(){
		if ($this->session->userdata('logueado')){
			if ($this->input->is_ajax_request()) {
			$id_det_plan = $this->input->post("id");
			$this->plan_model->eliminar_det_plan($id_det_plan);
			}
			}else{
			redirect('login');
			}
	}
}
