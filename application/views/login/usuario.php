<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->helper('security');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->library('security');
			$this->load->model('pais_model');
			$this->load->model('tipo_usuario_model');
			$this->load->model('usuario_model');
			$this->load->model('habilidad_model');
			$this->load->model('idioma_model');
			$this->load->model('perfil_model');
			$this->load->model('proyecto_model');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
	}
	public function index()
	{
		redirect('usuario/grilla');
	}
	public function grilla(){
		if ($this->session->userdata('logueado')){
			try {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->set_subject('Usuario');
			$crud->set_language('spanish');
			$crud->set_relation('id_perfil','t_perfil','descripcion');
			$crud->set_relation('id_tipo_usuario','t_tipo_usuario','descripcion');
			$crud->set_relation('id_plan','t_plan','descripcion');
			$crud->set_relation('cod_pais','t_pais_usuario','pais');
			$crud->display_as('id_perfil','Perfil');
			$crud->display_as('id_tipo_usuario','Tipo de Usuario');
			$crud->display_as('id_plan','Plan');
			$crud->display_as('cod_pais','Pais');
			$crud->display_as('nombre','Nombre y Apellidos');
			$crud->display_as('ocupacion','Ocupacion');
			$crud->display_as('sobre_mi','Sobre mi');
			$crud->display_as('login','Login');
			$crud->display_as('clave','Password');
			$crud->display_as('puntaje','Puntaje');
			$crud->columns('id_perfil','id_tipo_usuario','id_plan','cod_pais','nombre','ocupacion','sobre_mi','login','puntaje');
			$crud->required_fields('id_nivel','id_tipo_usuario','id_plan','cod_pais','nombre','sobre_mi','login','puntaje');
			$crud->add_action('Ver Usuario', '', '','fa fa-eye',array($this,'id_primaria'));
			$crud->unset_delete();
			$crud->unset_read();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add')
			{
			redirect('usuario/add');
			}
			//las vistas
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral',$data);
			$this->load->view('../../assets/inc/menu_superior',$data);
			$this->load->view('usuario/usuario',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
	public function add(){
		try {
			$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->set_subject('Usuario');
			$data = array(
				'pais' =>$this->pais_model->get_pais(),
				'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario());
			$output = $crud->render();
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('modal/modal_nuevo_usuario',$data);
			$this->load->view('usuario/add' );
			$this->load->view('../../assets/inc/footer_common_add',$output);
		} catch (Exception $e) {
				}
		}
		public function guardar_usuario(){
			$id_pais=$this->input->post('cb_pais');
			$id_tipo_usuario=$this->input->post('cb_tipo_usuario');
			$id_perfil=1;
			$id_plan=1;
			$nombre=$this->input->post('txt_nombre');
			$ocupacion=$this->input->post('txt_ocupacion');
			$direccion=$this->input->post('txt_direccion');
			$telf=$this->input->post('txt_telf');
			$login=$this->input->post('txt_login');
			$clave=$this->input->post('txt_clave2');
			$sobre_mi=$this->input->post('txt_sobre_mi');
			$data=$this->usuario_model->buscar_login($login);
			if ($data) {
				foreach ($data->result() as $data) {
				$login_bd=$data->login;
			}
			}else{
				$login_bd=0;
			}
			$imagen="image.png";
			$data_perfil=$this->perfil_model->get_perfil_id($id_perfil);
			foreach ($data_perfil->result() as $data) {
				$num_propuesta=$data->num_propuesta;
			}
			if ($login_bd===$login) {
				redirect('login','refresh');
			}else{
				$clave_2 = do_hash($clave); // SHA1
				$this->usuario_model->guardar_usuario($id_perfil,$id_tipo_usuario,$id_plan,$id_pais,$nombre,$ocupacion,$direccion,$telf,$login,$clave_2,$sobre_mi,$imagen,$num_propuesta);
				redirect('login');
			}
		}
		 function id_primaria($primary_key , $row){
				return site_url('usuario/ver_usuario').'/'.$row->id;
		}
		public function ver_usuario(){
				if ($this->session->userdata('logueado')){
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$id_usuario = $this->session->flashdata('id_usuario');
				if ($id_usuario==null) {
				$id_usuario = $this->uri->segment(3);
				}
				if ($id_usuario==null) {
					redirect('usuario/grilla');
				}
				$data = array(
					'ver_usuario' =>$this->usuario_model->get_usuario_id($id_usuario),
				 	'det_usuario'=>$this->usuario_model->get_det_usuario_id($id_usuario),
				 	'det_idioma'=>$this->usuario_model->get_det_idioma_id($id_usuario),
				 	'idioma'=>$this->idioma_model->get_idioma(),
				 	'pais' =>$this->pais_model->get_pais()
				 );
				$data_proyecto = array('proyecto_id_usuario_asignado' =>$this->proyecto_model->get_proyecto_id_usuario_asignado($id_usuario),
			'proyecto_id_usuario_remitente'=>$this->proyecto_model->get_proyecto_id_usuario_remitente($id_usuario) );
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->set_subject('Usuario');
			$output = $crud->render();
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
			$this->load->view('../../assets/inc/menu_superior',$data_proyecto);
			$this->load->view('usuario/ver_usuario',$data);
			$this->load->view('modal/modal_nueva_habilidad');
			$this->load->view('modal/modal_nuevo_idioma',$data);
			$this->load->view('modal/modal_nueva_imagen');
			$this->load->view('modal/modal_editar_usuario',$data);
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}else{
			redirect('login');
		}
	}
		public function subir_imagen(){
		if ($this->session->userdata('logueado')){
		$id_usuario=$this->input->post('txt_id_usuario');
		$mi_archivo = 'mi_archivo';
      $config['upload_path'] = "images/";
      $config['allowed_types'] = '*';
      $config['remove_spaces']=TRUE;
      $config['overwrite'] = true;
      $this->load->library('upload', $config);
      #si existe el archivo, lo sube.
      if ($this->upload->do_upload($mi_archivo)) {
      $data= $this->upload->data();
      $archivo=$data['file_name'];
      $this->usuario_model->actualizar_usuario_imagen($id_usuario, $archivo);
      $this->session->set_flashdata('id_usuario', $id_usuario);
       redirect('usuario/ver_usuario');
		}
	}else{
		redirect('login');
	}
}
	public function olvido_su_contrasena(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
		$data['alerta']=false;
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('usuario/olvido_contrasena',$data);
		$this->load->view('../../assets/inc/footer_common');
		}
	public function enviar_correo(){
		$correo=$this->input->post('txt_correo');
		$data=$this->usuario_model->buscar_login($correo);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
			if ($data) {
				foreach ($data->result() as $data) {
				$login_bd=$data->login;
				$id_login=$data->id;
			}
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
		$id_proyecto=$this->input->post('txt_id_proyecto');
		$destinatario=$correo;
		$id_login_hash= do_hash($id_proyecto);
		$mensaje="Has Solicitado un cambio de password; si usted lo ha solicitado haga clic en el siguiente enlace para Reestablecer su contaseña";
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->load->library('email');
		$this->email->from('publicaciones@freelance-employ.com');
		$this->email->to($destinatario);
		$this->email->subject('Reestablecer Password');
		$direccion=base_url();
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje.'<br><a href="'.base_url().'usuario/resetear_contra/'.$id_login_hash.'"><img src="https://ptgbgg-ch3302.files.1drv.com/y3mv9nFHIv5RqTocxOyJ395rjzRSwlmquLekLCVNBH0YdEnzOGqQ3xnDFXVB7y6bwvE8cVXJ9LppJQQohLWuHdoxcq6oBdjjTNj2xWTbsrhyKgGh5wMuRzVkdTdgQRgwtgkENz4-Yu8shpk1So3glessS7vD0kEzvm59gkfAvvWfjA?width=115&height=59&cropmode=none" width="115" height="59" /></a>');
	//    $this->email->set_alt_message('Tu correo no recibe HTML');
	$result = $this->email->send();
			#aqui envia el email.
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('usuario/se_envio_mail',$data);
			$this->load->view('../../assets/inc/footer_common');
		}else{
			$data['alerta']=true;
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('usuario/olvido_contrasena',$data);
			$this->load->view('../../assets/inc/footer_common');
		}
	}
	public function resetear_contra(){
		$id_login['id']=$this->uri->segment(3);
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('usuario/reestablecer_password',$id_login);
		$this->load->view('../../assets/inc/footer_common');
	}
	public function exito(){
		$id_usuario=$this->input->post('las_putas');
		$txt_clave2=$this->input->post('txt_clave2');
		$txt_clave_3=do_hash($txt_clave2);
		$data_usuario=$this->usuario_model->buscar_id();
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
		foreach ($data_usuario->result() as $data) {
			$id_usuario_hash=do_hash($data->id);
			if ($id_usuario=$id_usuario_hash) {
				$id_usuario_2=$data->id;
				echo $id_usuario_2;
				exit();
			}
		}
		$datos=$this->usuario_model->actualizar_usuario_contra($id_usuario_2,$txt_clave_3);
		if ($datos) {
			echo "si atualizazo";
			exit();
		}else{
			echo "no se actualizo";
			exit();

		}
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('usuario/exito');
		$this->load->view('../../assets/inc/footer_common');
	}
	public function actualizar_usuario(){
		if ($this->session->userdata('logueado')){
			$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
			$id_pais=$this->input->post('cb_pais');
			$id_tipo_usuario=$this->input->post('cb_tipo_usuario');
			$nombre=$this->input->post('txt_nombre');
			$ocupacion=$this->input->post('txt_ocupacion');
			$direccion=$this->input->post('txt_direccion');
			$telf=$this->input->post('txt_telf');
			$this->usuario_model->actualizar_usuario_perfil($data_usuario['id_usuario'],$id_pais ,$id_tipo_usuario ,$nombre ,$ocupacion ,$direccion ,$telf);
			 $this->session->set_flashdata('id_usuario', $data_usuario['id_usuario']);
         redirect('login/cerrar_sesion');
		}else{
			redirect('login');
		}
	}
	public function ver_perfil_usuario(){
				if ($this->session->userdata('logueado')){
				$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('nombre'),
					  'id_perfil'=>$this->session->userdata('id_perfil'),
					  'imagen'=>$this->session->userdata('imagen'),
					  'mensaje'=>$this->mensaje_model->buscar_mensaje_id_usuario($this->session->userdata('id')),
					  'propuesta'=>$this->propuesta_model->buscar_propuesta_id_usuario($this->session->userdata('id')));
				$id_usuario  = $this->session->flashdata('id_usuario');
				if ($id_usuario==null) {
				$id_usuario = $this->uri->segment(3);
				}
				if ($id_usuario==null) {
					redirect('usuario/grilla');
				}
				$data = array(
					'ver_usuario' =>$this->usuario_model->get_usuario_id($id_usuario),
				 	'det_usuario'=>$this->usuario_model->get_det_usuario_id($id_usuario),
				 	'det_idioma'=>$this->usuario_model->get_det_idioma_id($id_usuario),
				 	'idioma'=>$this->idioma_model->get_idioma(),
				 	'pais' =>$this->pais_model->get_pais()
				 );
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
			$data_proyecto = array('proyecto_id_usuario_asignado' =>$this->proyecto_model->get_proyecto_id_usuario_asignado($id_usuario),
			'proyecto_id_usuario_remitente'=>$this->proyecto_model->get_proyecto_id_usuario_remitente($id_usuario) );
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data_usuario);
				$this->load->view('../../assets/inc/menu_superior',$data_proyecto);
				$this->load->view('usuario/ver_perfil_usuario',$data);
				$this->load->view('../../assets/inc/footer_common_add');
		}else{
			redirect('login');
		}
	}
}
?>