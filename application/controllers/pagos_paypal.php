<?php
class Pagos_paypal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->library('grocery_crud');
		$this->load->model('propuesta_model');
		$this->load->model('proyecto_model');
		$this->load->model('deposito_garantia_model');
		$this->load->model('mensaje_model');
		$this->load->model('usuario_model');
	}
	public function pago_seguro(){
		$id_propuesta=$this->input->post('txt_id_propuesta');
		$descripcion_proyecto=$this->input->post('txt_descripcion');
		$monto_sin_comision=$this->input->post('txt_monto_sin_comision');
		$monto=$this->input->post('txt_monto');
		$this->session->set_flashdata('id_propuesta', $id_propuesta);
		$config['business'] 			= 'info@freelance-employ.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= base_url().'/pagos_paypal/notify_payment';
		$config['cancel_return'] 		= base_url().'/pagos_paypal/cancel_payment';
		$config['notify_url'] 			= 'process_payment.php'; //IPN Post
		$config['production'] 			= true; //Its false by default and will use sandbox
		$config["invoice"]				= random_string('numeric',8); //The invoice id
		$this->load->library('paypal',$config);
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		$this->paypal->add($descripcion_proyecto,$monto); //First item
		$this->paypal->pay(); //Proccess the payment
	}
	public function notify_payment(){
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
			$id_propuesta  = $this->session->flashdata('id_propuesta');
		if ($id_propuesta==null) {
			redirect('propuesta/cargar_grilla','refresh');
		}
		$data_1=$this->propuesta_model->get_propuesta_id_sin_encode($id_propuesta);
		foreach ($data_1->result() as $data) {
			$id_proyecto=$data->id_proyecto;
			$id_usuario_envia=$data->id_usuario_envia;
			$monto_sin_comision=$data->precio_propuesta;
		}
		$data_2=$this->proyecto_model->get_proyecto_id($id_proyecto);
		foreach ($data_2->result() as $data_3) {
			$titulo_proyecto=$data_3->titulo_proyecto;
			$id_usuario_remitente=$data_3->id_cliente_receptor;
		}
		$id_status=2;
		$id_status_propuesta=2;
		$fecha_asignado_usuario=date('Y-m-d');
		$this->proyecto_model->actualizar_proyecto_asignar_usuario($id_proyecto,$id_usuario_envia, $id_status, $fecha_asignado_usuario);
		$this->propuesta_model->actualizar_propuesta_status($id_propuesta, $id_status_propuesta, $fecha_asignado_usuario);
		$received_data = $this->input->post();
		$id_usuario_recibe=$id_usuario_envia;
		$status_deposito_garantia=1;
		$monto_con_comision=$received_data['mc_gross'];
		$num_factura=$received_data['invoice'];
		$fecha_pago=$received_data['payment_date'];
		$descripcion=$received_data['item_name1'];
		$this->deposito_garantia_model->guardar_deposito_garantia($id_usuario_remitente,$id_usuario_recibe,$id_proyecto,$id_status,$num_factura, $monto_sin_comision, $monto_con_comision,$fecha_pago, $descripcion);
		$data = array('id_usuario_envia' =>$id_usuario_remitente,
		   			'id_usuario_recibe' =>$id_usuario_recibe,
		   			'id_proyecto' =>$id_proyecto,
		   			'id_status_deposito_garantia' =>$id_status,
		   			'num_factura' =>$num_factura,
		   			'monto_sin_comision' =>$monto_sin_comision,
		   			'monto_con_comision' =>$monto_con_comision,
		   			'fecha_de_pago' =>$fecha_pago,
		   			'descripcion_pago' =>$descripcion);
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
	$destinatario=$login;
	$mensaje="Han aceptado tu propuesta,del proyecto: ".$titulo_proyecto." Tu dinero esta en deposito de garantía en nuestra plataforma hasta la finalización del proyecto. Cuando el Usuario este conforme al 100% por el trabajo realizado, nos informara para liberar el dinero que sera depositado en su cuenta de Paypal";
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$this->email->subject('!!Aceptaron tu propuesta!!');
	$direccion=base_url();
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje.'<br>');
	//    $this->email->set_alt_message('Tu correo no recibe HTML');
		$result = $this->email->send();
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
		$this->load->view('../../assets/inc/menu_superior',$data_usuario);
		$this->load->view('propuesta/propuesta_aceptada',$data);
		} catch (Exception $e) {
		}
			}else{
				redirect('login');
			}
		#print_r($received_data);
	}
	public function cancel_payment(){
		redirect('propuesta','refresh');
	}
}