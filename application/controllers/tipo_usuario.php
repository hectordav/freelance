<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tipo_usuario extends CI_Controller {
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
		redirect('tipo_usuario/cargar_grilla');
	}
	public function cargar_grilla(){
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
				$crud->set_table('t_tipo_usuario');
				$crud->set_subject('Tipo de usuario');
				$crud->set_language('spanish');
				$crud->display_as('descripcion','Descripcion');
				$crud->columns('descripcion');
				$crud->required_fields('descripcion');
				$output = $crud->render();
				//las vistas

		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			redirect('login','refresh');
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('tipo_usuario/tipo_usuario',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}

		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
	//**********************encripta la clave en add y update********************************
	function encripta_password_insert($post_array)
	 {
			$this->load->library('encrypt');
			$post_array['clave'] =md5($post_array['clave']);
			return $this->db->insert('t_usuario',$post_array);
	}
	function encripta_password_update($post_array, $primary_key)
	{
		    $this->load->library('encrypt');
		    if(!empty($post_array['password']))
		    {
		     	$post_array['clave'] =md5($post_array['clave']);
		    }
		    else
		    {
		    	$post_array['clave'] =md5($post_array['clave']);
		        //unset($post_array['password']);
		    }
			return $this->db->update('t_usuario',$post_array,array('ID' => $primary_key));
	}
	//*******************************************************************************
	function input_clave_add()
	{
	return ' <input  name="clave" type="password" class="form-control">';
	}
	function input_clave_edit($value, $primary_key)
	{
	return ' <input  name="clave" type="password" class="form-control"value="'.$value.'">';
	}
}
