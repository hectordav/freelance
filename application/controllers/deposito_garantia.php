<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deposito_garantia extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
			$this->load->model('deposito_garantia_model');
	}
	public function index()
	{
		redirect('deposito_garantia/grilla');
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
				$crud->set_theme('bootstrap');
				$crud->set_table('t_deposito_garantia');
				$crud->set_subject('Proyecto');
				$crud->set_language('spanish');
				$crud->where('id_usuario_recibe',$data['id_usuario']);
				$crud->set_relation('id_usuario_envia','t_usuario','login');
				$crud->set_relation('id_proyecto','t_proyecto','titulo');
				$crud->set_relation('id_status_propuesta','t_status_propuesta','descripcion');
				$crud->set_subject('Deposito en Garantia');
				$crud->set_language('spanish');
				$crud->display_as('id_usuario_envia','Envia');
				$crud->display_as('id_proyecto','proyecto');
				$crud->display_as('id_status_propuesta','Status');
				$crud->display_as('num_factura','# factura');
				$crud->display_as('monto_sin_comision','Monto');
				$crud->display_as('fecha_de_pago','Fecha');
				$crud->columns('id_usuario_envia','id_proyecto','id_status_propuesta','num_factura','monto_sin_comision','fecha_de_pago');
				$crud->add_action('Retiro de Dinero', '', '','fa fa-eye',array($this,'id_primaria'));
				$crud->unset_add();
				$crud->unset_edit();
				$crud->unset_read();
				$crud->unset_delete();
				$output = $crud->render();
				//las vistas
	if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_1_2',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('deposito_garantia/deposito_garantia',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('deposito_garantia/deposito_garantia',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}

		}catch (Exception $e) {
		}
		}else{
			redirect('login');
		}
	}
	function id_primaria($primary_key , $row){
    	if ($this->session->userdata('logueado')){
				return site_url('deposito_garantia/retiro_de_dinero').'/'.$row->id;
				}else{
				redirect('login');
				}
	}
	public function retiro_de_dinero(){
		if ($this->session->userdata('logueado')){
			try {
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'id_tipo_usuario'=>$this->session->userdata('id_tipo_usuario'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$id_retiro=$this->uri->segment(3);
				$data_retiro['deposito_garantia']=$this->deposito_garantia_model->get_retiro_dinero($id_retiro);
				foreach ($data_retiro['deposito_garantia']->result() as $data) {
				$id_status_propuesta=$data->id_status_propuesta;
			}
				if ($id_status_propuesta==1 || $id_status_propuesta==2 || $id_status_propuesta==4 || $id_status_propuesta==5 ) {
			$this->session->set_flashdata('alerta', 'No se puede Retirar el Dinero cuando el Status es diferente a Retiro de Dinero');
			redirect('deposito_garantia/grilla','refresh');

		}else{
			$guardar=false;
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_deposito_garantia');
				$crud->set_subject('deposito_garantia');
				$crud->set_language('spanish');
				$crud->unset_delete();
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_usuario);
				$this->load->view('modal/modal_retiro_dinero',$data_retiro);
				$this->load->view('deposito_garantia/retiro_dinero');
				$this->load->view('../../assets/inc/footer_common_add',$output);
		}
			} catch (Exception $e) {
			}
		}else{
			redirect('login','refresh');
		}
	}
	public function retirar_dinero(){
		$id_deposito_garantia=$this->input->post('txt_id_deposito');
		$login_usuario=$this->input->post('txt_login_usuario');
		$titulo_proyecto=$this->input->post('txt_titulo_proyecto');
		$num_factura=$this->input->post('txt_num_factura');
		$monto_sin_comision=$this->input->post('txt_monto_sin_comision');
		$monto_con_comision=$this->input->post('txt_monto_con_comision');
		$fecha_pago=$this->input->post('txt_fecha_pago');
		$this->deposito_garantia_model->deposito_garantia_model->guardar_retiro_dinero($login_usuario, $titulo_proyecto, $num_factura, $monto_sin_comision, $monto_con_comision, $fecha_pago);
		$this->deposito_garantia_model->actualizar_retiro_dinero($id_deposito_garantia);

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
	$destinatario="publicaciones@freelance-employ.com";
	$mensaje="ir al modulo retiro de dinero para mas informacions";
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$this->email->subject('El usuario: '.$login_usuario.' esta solicitando retiro de dinero');
	$direccion=base_url();
	$this->email->message('<img src="https://ewqeyg-ch3302.files.1drv.com/y3pfm6sJrvgIvgD0Z2DoRKTsqNkuaRFoQOQlwq0tsVWg7qKFZe5DTa9NKtTHex19h--xB6i2hVwPVU6snWpouArr-16xAk4ymIBvdHBvHXXV8HeSX1MEn0DoZvQUuZfEoc7cUq6_P1YFS4oLmqb2oveSCkDtlD2Jy4J9-CdJJXzdLs/frelance_employ.jpg?psid=1" alt=""><br>'.$mensaje.'<br>');
	$result = $this->email->send();
	$this->session->set_flashdata('alerta', 'Se envio Un email al Administrador y en 2 dias se hace efectivo su Dinero');
			redirect('deposito_garantia/grilla','refresh');
	redirect('deposito_garantia','refresh');
			}
	}

