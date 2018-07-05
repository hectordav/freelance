<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Num_habilidades extends CI_Controller {

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
		redirect('num_habilidades/grilla');
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
				$crud->set_table('t_num_habilidades');
				$crud->set_subject('# Habilidades');
				$crud->set_language('spanish');
				$crud->set_relation('id_perfil','t_perfil','descripcion',null,'id ASC');
				$crud->display_as('id_perfil','Perfil');
				$crud->display_as('num_habilidades','# habilidades');
				$crud->required_fields('id_perfil','num_habilidades');
				$output = $crud->render();
				//las vistas

	if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			redirect('login','refresh');
		}
		if ($data['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('num_habilidades/num_habilidades',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
			}catch (Exception $e) {

			}
			}else{
			redirect('login');
			}


	}

}
