<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Prueba_busqueda_mail extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
			$this->load->model('buscar_todos_proyecto_model');
			$this->load->model('usuario_model');
	}
	public function index()
	{
		redirect('prueba_busqueda_mail/busqueda');
	}
	public function busqueda(){
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
		$id_proyecto="1";
	$data_usuario=$this->usuario_model->get_usuario_boletin();
	foreach ($data_usuario->result() as $key) {
	$destinatario=$key->usuario_login;
	$this->load->library('email', $config);
	$this->email->set_newline("\r\n");
	$this->load->library('email');
	$this->email->from('publicaciones@freelance-employ.com');
	$this->email->to($destinatario);
	$fecha_hoy=date('y-m-d');
	$fecha=date('d-m-Y', strtotime($fecha_hoy));
	$this->email->subject('Nuevos Proyectos Publicados en Freelance Employ '.$fecha);
	$direccion=base_url();
		$mensaje.="<h2>Estos proyectos se acaban de publicar y pueden interesarte, entra y haz tu propuesta </h2>";
		$mensaje.="<table width='100%' border='0'>";
			$mensaje.="<tr>";
			$mensaje.="<td width='50%' align='center' style='border-collapse:collapse;padding:5px 20px;border-bottom:1px dashed #bababa;width:67.85714286%;border-left:20px solid #fff;border:0;color:#0073b8;background-color:#FFF50D;min-width:67.85714286%!important'bgcolor='red'><h2>Proyecto</h2></td >";
			$mensaje.="<td width='50%' style='border-collapse:collapse;padding:5px 20px;border-bottom:1px dashed #bababa;width:67.85714286%;border-left:20px solid #fff;border:0;color:#0073b8;background-color:#FFF50D;min-width:67.85714286%!important' align='center'><h2>Acciones</h2></td >";
		$data_proyectos=$this->buscar_todos_proyecto_model->buscar_todos();
		foreach ($data_proyectos->result() as $data) {
			/*echo $data->id_proyecto. "<br>";*/

			$mensaje.="</tr>";
			$mensaje.="<tr>";
			$mensaje.="<td width='80%' style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'>";
			$mensaje.="<h3></strong>".$data->titulo_proyecto."</strong></h3><p>";
			$mensaje.=substr($data->descripcion_proyecto, 0, 200).'... <p>';
			$mensaje.="<strong> Precio:&nbsp;</strong>".$data->rango_precio_proyecto."&nbsp;";
			$fecha=date('d-m-Y', strtotime($data->fecha_inicio));
			$mensaje.="<strong>Pais:&nbsp;</strong>" .$data->pais_usuario."&nbsp;"."<strong>Publicado:&nbsp;</strong>".$fecha."&nbsp;"."<strong>Plazo:&nbsp;</strong>".$data->plazo_entrega;
			$mensaje.="</td>";
			$mensaje.="</td>";
			$mensaje.="</td>";
			$mensaje.="</td>";
			$mensaje.="<td align='center'style='border-width: 1px; border-style: dashed;border-color: #9E9C9C;'>";
			$mensaje .= '<br><a href="'.base_url().'proyecto/ver_proyecto/'.$data->id_proyecto.'"><img src="https://pdgbgg-ch3302.files.1drv.com/y3mRREBSZGEZw5leCdooVSP1wvfaj7xEK5z-2UXs3bfhsao7xbkEvsX_hqpKRu2Pa7UFqhCf79nh3DaavZ1ZSmOELmJcKzCV7ZfzgifWIjYQ-5N-gsioPR95KN8gfdgK7CzU_VuHu9hMZp9nVvtacs9dd0qCfX_mJ_KXnPa8lc85L4?width=138&height=46&cropmode=none" width="138" height="46" /></a><br>';
			$mensaje.="</td>";
			$mensaje.="</tr>";

		}
			$mensaje.="</table>";
			$mensaje.="<p>";
			$mensaje.=' Esto es un email enviado por freelance-Employ.com; si desea Cancelar la suscripcion a Boletines de Noticias, Haga clic <a href='.base_url().'usuario/salir_boletin/>Aqui</a> </h5>';
	$this->email->message('<img src="https://pzgbgg-ch3302.files.1drv.com/y3mo29NIflZQDoz6WrFzmtJEHmbO0hXc9mpNVtW36MFSgXQpD1J_dQV6CGilfLEcH0ihkgqfGZ2_24X-s40VdbPX60N4IaceH0s61VY8NBpbA66CX5pT23B4geuX3ccmWUND9arpDelAlIEldtdeG5Jz2cC-0DcUGN-Q4666KgfAVw?width=795&height=214&cropmode=none" width="795" height="214" /><br>'.$mensaje);

	$result = $this->email->send();
	unset($mensaje);
	//    $this->email->set_alt_message('Tu correo no recibe HTML');

		}

	}
}
