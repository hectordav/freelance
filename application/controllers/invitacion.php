<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invitacion extends CI_Controller {
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
			$this->load->model('pais_model');
			$this->load->model('categoria_model');
			$this->load->model('usuario_model');
			$this->load->model('buscar_todos_proyecto_model');
	}
	public function index()
	{
		redirect('invitacion/grilla');
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
			$data_invitacion = array('proyecto_id_usuario' =>$this->proyecto_model->get_proyecto_id_usuario_remitente($data['id_usuario']),
			'pais'=>$this->pais_model->get_pais(),
			'categoria'=>$this->categoria_model->get_categoria());
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_ciudad');
				$crud->set_subject('Ciudad');
				$crud->set_language('spanish');
				$crud->set_relation('cod_pais','t_pais_usuario','pais');
				$crud->display_as('cod_pais','Pais');
				$crud->display_as('ciudad','Ciudad');
				$crud->required_fields('cod_pais','ciudad');
				$crud->unset_delete();
				$output = $crud->render();
		if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/invitacion',$data_invitacion);
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/invitacion',$data_invitacion );
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		}catch (Exception $e) {
		}
	}else{
		redirect('login');
	}
	}
	public function buscar_freelance(){
		$id_proyecto=$this->session->flashdata('id_proyecto');
		$id_pais  = $this->session->flashdata('id_pais');
		$id_ciudad  = $this->session->flashdata('id_ciudad');
		$id_categoria  = $this->session->flashdata('id_categoria');
		$id_sub_cat  = $this->session->flashdata('id_sub_cat');
		$data = array('id_usuario' =>$this->session->userdata('id'),
			  'nombre_usuario'=>$this->session->userdata('nombre'),
			  'id_perfil'=>$this->session->userdata('id_perfil'),
			  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
			  'imagen'=>$this->session->userdata('imagen'),
			  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
			  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
		if ($id_proyecto ==null && $id_pais ==null && $id_ciudad ==null && $id_categoria ==null && $id_sub_cat==null) {
		$id_proyecto=$this->input->post('id_proyecto');
		$id_pais=$this->input->post('id_pais');
		$id_ciudad=$this->input->post('id_ciudad');
		$id_categoria=$this->input->post('id_categoria');
		$id_sub_cat=$this->input->post('id_sub_cat');
		}
		$this->session->set_flashdata('id_proyecto', $id_proyecto);
		$this->session->set_flashdata('id_pais', $id_pais);
		$this->session->set_flashdata('id_ciudad', $id_ciudad);
		$this->session->set_flashdata('id_categoria', $id_categoria);
		$this->session->set_flashdata('id_sub_cat', $id_sub_cat);
		$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_ciudad');
				$crud->set_subject('Ciudad');
				$crud->set_language('spanish');
				$crud->set_relation('cod_pais','t_pais_usuario','pais');
				$crud->display_as('cod_pais','Pais');
				$crud->display_as('ciudad','Ciudad');
				$crud->required_fields('cod_pais','ciudad');
				$crud->unset_delete();
				$output = $crud->render();
		$data_invitacion = array('proyecto_id_usuario' =>$this->proyecto_model->get_proyecto_id_usuario_remitente($data['id_usuario']),
			'pais'=>$this->pais_model->get_pais(),
			'categoria'=>$this->categoria_model->get_categoria(),
			'freelance_encontrados'=>$this->usuario_model->get_usuario_invitacion($id_pais, $id_ciudad, $id_categoria, $id_sub_cat));
		if ($data_invitacion['freelance_encontrados']) {
/**********************si hay usuarios*****************************************/
			if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/freelance_encontrados',$data_invitacion);
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/freelance_encontrados',$data_invitacion );
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
/**************************************************************************/
		}else{
/**********************no hay usuarios*****************************************/
			if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/freelance_encontrados',$data_invitacion);
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}
		if ($data['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/script/script_combo_categoria_sub_categoria');
			$this->load->view('../../assets/inc/menu_lateral',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('invitacion/freelance_encontrados',$data_invitacion );
			$this->load->view('../../assets/inc/footer_common_add',$output);
		$id_pais=$this->input->post('id_pais');
		$id_ciudad=$this->input->post('id_ciudad');
		$id_categoria=$this->input->post('id_categoria');
		$id_sub_cat=$this->input->post('id_sub_cat');
		}
		}


	}
	public function enviar_mail(){
		$id_proyecto  = $this->session->flashdata('id_proyecto');
		$id_pais      = $this->session->flashdata('id_pais');
		$id_ciudad    = $this->session->flashdata('id_ciudad');
		$id_categoria = $this->session->flashdata('id_categoria');
		$id_sub_cat   = $this->session->flashdata('id_sub_cat');
		$id_usuario=$this->uri->segment(3);
		$this->session->set_flashdata('id_pais', $id_pais);
		$this->session->set_flashdata('id_ciudad', $id_ciudad);
		$this->session->set_flashdata('id_categoria', $id_categoria);
		$this->session->set_flashdata('id_sub_cat', $id_sub_cat);
		$this->session->set_flashdata('id_proyecto', $id_proyecto);
		$data_usuario=$this->usuario_model->get_usuario_id($id_usuario);
		$data_proyecto=$this->buscar_todos_proyecto_model->buscar_todos_proyecto_id($id_proyecto);
		foreach ($data_usuario->result() as $data) {
			$email=$data->usuario_login;
		}

		/*****************************el envio del mail***************************/
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
	$destinatario=$email;
	$mensaje=" De Acuerdo a tus capacidades, te han invitado a postularte a un proyecto, haga clic en ver proyecto para postularte";
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$this->email->subject('Has recibido una Invitacion a postularte a un proyecto # '.$id_proyecto.' ');
	$direccion=base_url();
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje.'<br><br><a href="'.base_url().'proyecto/ver_proyecto/'.$id_proyecto.'"><img src="https://pdgbgg-ch3302.files.1drv.com/y3mRREBSZGEZw5leCdooVSP1wvfaj7xEK5z-2UXs3bfhsao7xbkEvsX_hqpKRu2Pa7UFqhCf79nh3DaavZ1ZSmOELmJcKzCV7ZfzgifWIjYQ-5N-gsioPR95KN8gfdgK7CzU_VuHu9hMZp9nVvtacs9dd0qCfX_mJ_KXnPa8lc85L4?width=138&height=46&cropmode=none" width="138" height="46" /></a><br>');
	$result = $this->email->send();
		redirect('invitacion/buscar_freelance','refresh');
	}

}
