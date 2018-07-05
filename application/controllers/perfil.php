<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');

	}
	public function index()
	{
		redirect('perfil/grilla');
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
				$crud->set_table('t_perfil');
				$crud->set_subject('Perfil');
				$crud->set_language('spanish');
				$crud->display_as('descripcion','Descripcion');
				$crud->display_as('num_propuesta','# de Propuestas');
				$crud->display_as('puntaje_menor','Puntaje Menor');
				$crud->display_as('puntaje_mayor','Puntaje Mayor');
				$crud->columns('descripcion','num_propuesta','puntaje_menor','puntaje_mayor');
				$crud->required_fields('num_propuesta','descripcion','puntaje_menor','puntaje_mayor');
				$output = $crud->render();
				//las vistas
		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('perfil/perfil',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('perfil/perfil',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
}
