<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mensaje extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->model('mensaje_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');

	}
	public function index(){
		redirect('mensaje/cargar_grilla_recibidos');
	}
	public function cargar_grilla_recibidos(){
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
				$crud->set_table('t_mensaje');
				$crud->unset_edit();
				$crud->unset_delete();
				$output = $crud->render();
				//las vistas
				$id_usuario_receptor=$data_usuario['id_usuario'];
				$recibido="Recibidos";
				$data = array('mensaje' =>$this->mensaje_model->get_mensaje_recibido($id_usuario_receptor),
				 'recibido'=>$recibido,
				'status_mensaje'=>$this->mensaje_model->get_mensaje_recibido_sin_leer($id_usuario_receptor));
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('mensaje/mensaje',$data);
				$this->load->view('modal/modal_nuevo_mensaje_2',$data);
				$this->load->view('../../assets/inc/footer_common_mensaje',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
					$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('mensaje/mensaje',$data);
				$this->load->view('modal/modal_nuevo_mensaje_2',$data);
				$this->load->view('../../assets/inc/footer_common_mensaje',$output);
		}
		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
		public function cargar_grilla_enviados(){
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
				$crud->set_table('t_mensaje');
				$crud->unset_edit();
				$crud->unset_delete();
				$output = $crud->render();
				//las vistas
				$id_usuario_envia=3;
					$recibido="Enviados";
				$data = array('mensaje' =>$this->mensaje_model->get_mensaje_enviado($id_usuario_envia),
				 'recibido'=>$recibido);
				if ($data['mensaje']=$this->mensaje_model->get_mensaje_enviado($id_usuario_envia)) {
			if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('mensaje/mensaje',$data);
				$this->load->view('../../assets/inc/footer_common_mensaje',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('mensaje/mensaje',$data);
				$this->load->view('../../assets/inc/footer_common_mensaje',$output);
		}
				}else{
					redirect('mensaje/cargar_grilla_recibidos');
				}
			}catch (Exception $e) {
			}
			}else{
				redirect('login');
				}
	}
	public function nuevo_mensaje(){
		if ($this->session->userdata('logueado')){
			$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$id_proyecto=$this->input->post('txt_id_proyecto');
			$id_usuario_envia=$data['id_usuario'];
			$id_usuario=$id_usuario_envia;
			$id_usuario_receptor=$this->input->post('txt_cliente_receptor');
			$id__mensaje=$this->input->post('txt_id_proyecto');
			$mensaje=$this->input->post('txt_mensaje');
			$status_mensaje=2;
			$fecha=date('Y-m-d');
			$this->mensaje_model->guardar_mensaje( $id_proyecto,$id_usuario_envia,$id_usuario_receptor, $status_mensaje,$mensaje,$fecha);
			$this->session->set_flashdata('id_proyecto', $id_proyecto);
			redirect('proyecto/ver_proyecto');
			}else{
			redirect('login');
			}
	}
	public function nuevo_mensaje_2(){
		if ($this->session->userdata('logueado')){
			$id_proyecto=$this->input->post('txt_id_proyecto');
			$id_usuario_envia=$this->input->post('txt_cliente_envia');
			$id_usuario_receptor=$this->input->post('txt_cliente_receptor');
			$id__mensaje=$this->input->post('txt_id_proyecto');
			$mensaje=$this->input->post('txt_mensaje');
			$fecha=date('Y-m-d');
			$status_mensaje=2;
			$this->mensaje_model->guardar_mensaje( $id_proyecto,$id_usuario_envia,$id_usuario_receptor, $status_mensaje,$mensaje,$fecha);
			$this->session->set_flashdata('id_proyecto', $id_proyecto);
			redirect('mensaje/cargar_grilla_recibidos');
			}else{
			redirect('login');
			}
	}
	public function nuevo_mensaje_propuesta(){
		if ($this->session->userdata('logueado')){
			$id_proyecto=$this->input->post('txt_id_proyecto');
			$id_usuario_envia=$this->input->post('txt_cliente_envia');
			$id_usuario_receptor=$this->input->post('txt_cliente_receptor');
			$id__mensaje=$this->input->post('txt_id_proyecto');
			$mensaje=$this->input->post('txt_mensaje');
			$fecha=date('Y-m-d');
			$status_mensaje=2;
			$this->mensaje_model->guardar_mensaje( $id_proyecto,$id_usuario_envia,$id_usuario_receptor, $status_mensaje,$mensaje,$fecha);
			$this->session->set_flashdata('id_proyecto', $id_proyecto);
			redirect('propuesta/cargar_grilla');
			}else{
			redirect('login');
			}
	}
	public function cuerpo_mensaje(){
		if ($this->session->userdata('logueado')){
				if($this->input->is_ajax_request()){
					$data= explode("/",$this->input->post("id"));
					$id_usuario_envia=$data[0];
					$id_proyecto=$data[1];


					$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$id_usuario_receptor=$data['id_usuario'];

				$id_status_mensaje=1;
				$datos=$this->mensaje_model->get_mensaje_id($id_usuario_envia, $id_usuario_receptor, $id_proyecto);
				$this->mensaje_model->actualizar_mensaje_leido($id_usuario_envia,$id_status_mensaje);
				echo json_encode($datos);
				}
			}else{
			redirect('login');
			}
	}
}
