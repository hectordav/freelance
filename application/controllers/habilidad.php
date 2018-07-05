<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habilidad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->model('habilidad_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');


	}
	public function index()
	{
		redirect('habilidad/grilla');
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
				$crud->set_table('t_habilidad');
				$crud->set_subject('Habilidades');
				$crud->set_language('spanish');
				$crud->display_as('descripcion','Descripcion');
				$crud->required_fields('descripcion');
				$crud->unset_delete();
				$output = $crud->render();
				//las vistas

		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			redirect('login','refresh');
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('habilidad/habilidad',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		}catch (Exception $e) {

		}
	}else{
	redirect('login');
	}
	}

	public function nueva_habilidad(){
		if ($this->session->userdata('logueado')){

			 $id_usuario=$this->input->post('txt_id_usuario');
			 $habilidad=$this->input->post('txt_habilidad');
			 $porcentaje=$this->input->post('txt_porcentaje');
			 $this->habilidad_model->guardar_habilidad($habilidad,$porcentaje);
			 $data_habilidad= $this->habilidad_model->get_id_habilidad($habilidad,$porcentaje);
			 foreach ($data_habilidad->result() as $data) {
			 	$id_habilidad=$data->id;
			 }
			 $this->usuario_model->guardar_det_usuario($id_usuario, $id_habilidad);
			 $this->session->set_flashdata('id_usuario', $id_usuario);
			 redirect('usuario/ver_usuario');
	}else{
		redirect('login');
	}

}
}
