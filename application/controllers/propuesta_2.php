<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Propuesta extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->model('propuesta_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('deposito_garantia_model');
			$this->load->model('comentario_usuario_model');
			$this->load->model('proyecto_model');
			$this->load->model('favorito_model');
	}
	public function index(){
		redirect('propuesta/cargar_grilla');
	}
	public function cargar_grilla(){
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
			$crud->set_table('t_propuesta');
			$crud->unset_edit();
			$crud->unset_delete();
			$output = $crud->render();
			//las vistas
			$id_usuario_receptor=$data_usuario['id_usuario'];
			$recibido="Recibidos";
			$data = array('propuesta' =>$this->propuesta_model->get_propuesta($id_usuario_receptor),
			'recibido'=>$recibido);
	if ($data_usuario['id_tipo_usuario']==1 || $data_usuario['id_tipo_usuario']==2) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral_1_2',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('propuesta/propuesta',$data);
			$this->load->view('modal/modal_nuevo_mensaje_propuesta',$data);
			$this->load->view('modal/modal_liberar_dinero',$data);
			$this->load->view('../../assets/inc/footer_common_propuesta',$output);
		}
		if ($data_usuario['id_tipo_usuario']==3) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_usuario);
			$this->load->view('propuesta/propuesta',$data);
			$this->load->view('modal/modal_nuevo_mensaje_propuesta',$data);
			$this->load->view('modal/modal_liberar_dinero',$data);
			$this->load->view('../../assets/inc/footer_common_propuesta',$output);
		}
			}catch (Exception $e) {
			}
			}else{
			redirect('login');
			}
	}
	public function nueva_propuesta(){
		if ($this->session->userdata('logueado')){
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
				$id_proyecto=$this->input->post('txt_id_proyecto');
				$id_usuario_envia=$this->input->post('txt_cliente_envia');
				$id_usuario_receptor=$this->input->post('txt_cliente_receptor');
				$neto=$this->input->post('txt_neto');
				$ganancia=$this->input->post('txt_ganancia');
				$total=$this->input->post('txt_total');
				$mensaje=$this->input->post('txt_mensaje');
				$fecha=date('Y-m-d');
				$usuario=$this->usuario_model->get_usuario_id($id_usuario_envia);
				foreach ($usuario->result() as $data) {
				$num_propuesta=$data->usuario_num_propuesta;
				}
				$num_propuesta=$num_propuesta-1;
				if ($this->upload->do_upload($mi_archivo)) {
				$data= $this->upload->data();
				$archivo=$data['file_name'];
				if ($num_propuesta<=0) {
				echo "<script languaje='javascript'>alert('Ya excedió el limite de propuestas Semanales, Si desea enviar mas Propuestas, Contrate el plan con Mejores Beneficios')</script>";
				$this->session->set_flashdata('id_proyecto', $id_proyecto);
				redirect('proyecto/ver_proyecto');
				}
				$this->propuesta_model->guardar_propuesta($id_proyecto, $archivo, $id_usuario_envia, $id_usuario_receptor, $neto, $ganancia, $total, $mensaje, $fecha);
				$this->usuario_model->actualizar_usuario_propuesta($id_usuario_envia,$num_propuesta);
				$this->session->set_flashdata('id_proyecto', $id_proyecto);
				redirect('proyecto/ver_proyecto');
				}else{
				if ($num_propuesta<=0) {
				echo "<script languaje='javascript'>alert('Ya excedió el limite de propuestas Semanales, Si desea enviar mas Propuestas, Contrate el plan con Mejores Beneficios')</script>";
				$this->session->set_flashdata('id_proyecto', $id_proyecto);
				redirect('proyecto/ver_proyecto');
				}
				$archivo=null;
				$fecha=date('Y-m-d');
				$id_status_mensaje=2;
				$this->propuesta_model->guardar_propuesta($id_proyecto, $archivo, $id_usuario_envia, $id_usuario_receptor, $id_status_mensaje, $neto, $ganancia, $total, $mensaje, $fecha);
				$this->usuario_model->actualizar_usuario_propuesta($id_usuario_envia,$num_propuesta);
				$this->session->set_flashdata('id_proyecto', $id_proyecto);
				redirect('proyecto/ver_proyecto');
				}
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
	public function cuerpo_propuesta(){
		if ($this->session->userdata('logueado')){
			if($this->input->is_ajax_request()){
			$id_det_mensaje= $this->input->post("id");
			$id_status_mensaje=1;
				$datos=$this->propuesta_model->get_propuesta_id($id_det_mensaje);
				$this->propuesta_model->actualizar_propuesta_leido($id_det_mensaje,$id_status_mensaje
);
				echo json_encode($datos);
		}
			}else{
			redirect('login');
			}
	}
	public function aceptar_propuesta(){
		if ($this->session->userdata('logueado')){
				$id_det_mensaje=$this->uri->segment(3);
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_propuesta');
				$crud->unset_edit();
				$crud->unset_delete();
				$output = $crud->render();
				$datos['propuesta']=$this->propuesta_model->get_propuesta_id_sin_encode($id_det_mensaje);
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('propuesta/aceptar_propuesta',$datos);
		}else{
			redirect('login');
		}
	}
	public function liberar_dinero(){
		if ($this->session->userdata('logueado')){
			$id_det_mensaje=$this->uri->segment(3);
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
		$id_propuesta=$this->input->post('txt_id_propuesta');
		$id_proyecto=$this->input->post('txt_id_proyecto');
		$data_propuesta=$this->propuesta_model->buscar_propuesta_id_liberar_dinero($id_propuesta);
		foreach ($data_propuesta->result() as $data) {
			$id_usuario_envia=$data->id_usuario_envia;
			$id_usuario_recibe=$data->id_usuario_recibe;
		}

		$data_deposito_garantia=$this->deposito_garantia_model->get_deposito_garantia($id_usuario_envia, $id_usuario_recibe);
		foreach ($data_deposito_garantia->result() as $data) {
			$id_deposito=$data->id;
		}

		$favorito=$this->input->post('ch_favorito');
		$puntaje=$this->input->post('puntaje');
		$comentario=$this->input->post('txt_comentario');
		$data_usuario_puntaje=$this->usuario_model->get_usuario_id($id_usuario_recibe);
		foreach ($data_usuario_puntaje->result() as $data) {
			$puntaje_anterior=$data->usuario_puntaje;
		}

		$puntaje_nuevo=$puntaje+$puntaje_anterior;
		$this->usuario_model->actualizar_usuario_puntaje($id_usuario_recibe,$puntaje_nuevo);
		$this->propuesta_model->liberar_deposito_garantia_id_usuario_recibe($id_proyecto,$id_usuario_envia,$id_usuario_recibe);
		$this->comentario_usuario_model->guardar_comentario($id_proyecto, $id_usuario_recibe,$comentario, $puntaje);

		#***********************envia el email******************************
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
	$data_usuario_2=$this->usuario_model->get_usuario_id($id_usuario_envia);
	foreach ($data_usuario_2->result() as $data) {
		$login=$data->usuario_login;
	}
	$this->proyecto_model->actualizar_proyecto_terminado($id_proyecto);
	$id_status_propuesta=3;
	$this->propuesta_model->actualizar_propuesta_status($id_propuesta,$id_status_propuesta);
	$destinatario=$login;
	$mensaje="!Felicidades! han liberado el dinero del proyecto ".$id_proyecto." Ahora puedes retirar satisfactoriamente tu dinero; recuerda calificar a tu cliente por el trabajo que hiciste.";
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$this->email->subject('!!Han Liberado tu dinero!!');
	$direccion=base_url();
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje.'<br>');
	$result = $this->email->send();
	if ($favorito==1) {
			$this->favorito_model->guardar_favorito($id_usuario_envia, $id_usuario_recibe);
		redirect('propuesta');
		}else{
		redirect('propuesta');
		}
		}else{
			redirect('login');
		}
	}
}
