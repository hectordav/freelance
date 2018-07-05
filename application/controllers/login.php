<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	 public $user=null;
	public function __construct()
	    {
        parent::__construct();
		$this->load->helper('security');
		$this->load->library('grocery_crud');
		$this->load->model('usuario_model');
		$this->load->model('perfil_model');
		$this->load->helper('url');
		$this->load->model('pais_model');
		$this->load->model('tipo_usuario_model');
		$this->load->model('moneda_model');
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
        $this->load->library('facebook', $array = array('appId' =>'1580195542273900
','secret'=>'00748797adbf3688a1f93a809c1b7d54' ));
        $this->user=$this->facebook->getUser();
	    }
	public function index(){
	$crud = new grocery_CRUD();
	$crud->set_theme('bootstrap');
	$crud->set_table('t_usuario');
	$crud->set_subject('Producto');
	$crud->set_language('spanish');
	$output = $crud->render();
	$this->user=$this->facebook->getUser();
	#La sesion de facebook.
	if ($this->user) {
            try {
                $user_profile= $this->facebook->api('/me');
           //     echo "</br>";
           //    echo $user_profile['id'];
              #  print_r($user_profile);
            } catch (FacebookApiException $e) {
                print_r($e);
                $user=null;
            }
        }
	if ($this->user) {
		redirect('login/iniciar_sesion_post');
	}else{
	$data_login['login']=$this->facebook->getLoginUrl(array("scope"=>'email,user_birthday,user_location'));
	#,'redirect_uri' => 'http://freelance-employ.com/login'
	$data = array(
			'pais' =>$this->pais_model->get_pais(),
			'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario(),
			'moneda'=>$this->moneda_model->get_tipo_moneda());
	$this->load->view('login/index');
	$this->load->view('../../assets/script/script_combo_pais');
	$this->load->view('modal/modal_login',$data_login);
	$this->load->view('modal/modal_nuevo_usuario',$data);
	}
}
public function condicion(){
	$crud = new grocery_CRUD();
	$crud->set_theme('bootstrap');
	$crud->set_table('t_usuario');
	$crud->set_subject('Producto');
	$crud->set_language('spanish');
	$output = $crud->render();
	$data = array(
			'pais' =>$this->pais_model->get_pais(),
			'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario());
	#La sesion de facebook.
	if ($this->user) {
            try {
                $user_profile= $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                print_r($e);
                $user=null;
            }
        }
	if ($this->user) {
		redirect('login/iniciar_sesion_post');
	}else{
	$data_login['login']=$this->facebook->getLoginUrl(array("scope"=>'email,user_birthday,user_location'));
	#,'redirect_uri' => 'http://freelance-employ.com/login'
	$data = array(
			'pais' =>$this->pais_model->get_pais(),
			'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario());
	$this->load->view('login/condicion');
	#$this->load->view('../../assets/inc/footer_common');
	}
}
public function quienes_somos(){
	$crud = new grocery_CRUD();
	$crud->set_theme('bootstrap');
	$crud->set_table('t_usuario');
	$crud->set_subject('Producto');
	$crud->set_language('spanish');
	$output = $crud->render();
	$data = array(
			'pais' =>$this->pais_model->get_pais(),
			'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario());
	#La sesion de facebook.
	if ($this->user) {
            try {
                $user_profile= $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                print_r($e);
                $user=null;
            }
        }
	if ($this->user) {
		redirect('login/iniciar_sesion_post');
	}else{
	$data_login['login']=$this->facebook->getLoginUrl(array("scope"=>'email,user_birthday,user_location'));
	#,'redirect_uri' => 'http://freelance-employ.com/login'
	$data = array(
			'pais' =>$this->pais_model->get_pais(),
			'tipo_usuario' =>$this->tipo_usuario_model->get_tipo_usuario());
	$this->load->view('login/quienes_somos');
	#$this->load->view('../../assets/inc/footer_common');
	}
}
public function como_funciona(){
	$crud = new grocery_CRUD();
	$crud->set_theme('bootstrap');
	$crud->set_table('t_usuario');
	$output = $crud->render();

	$this->load->view('login/como_funciona');
	}

	 public function iniciar_sesion_post(){
	 	try {
	 		$user_profile= $this->facebook->api('/me?fields=picture.width(100).height(100),first_name,last_name,email,location');
	 		$login=$user_profile['email'];
	 		$clave=do_hash($user_profile['id']);
	 		$nombre_apellido=$user_profile['first_name']." ".$user_profile['last_name'];
	 		$usuario = $this->usuario_model->login_facebook($login, $clave);

	 		if ($usuario) {
	 		$usuario_data = array(
             'id' => $usuario->id,
             'nombre' => $usuario->nombre,
             'id_perfil' => $usuario->id_perfil,
             'id_tipo_usuario' => $usuario->id_tipo_usuario,
             'logueado' => TRUE,
             'imagen'=>$usuario->imagen);
	 		 $this->session->set_userdata($usuario_data);
	 		 $id_status_usuario=2;
	 		 $this->usuario_model->actualizar_usuario_status($usuario_data['id'],$id_status_usuario);
	 		 redirect('login/logueado');
	 		}else{
	 		#si no existe lo crea
	 		$id_perfil=1;
			$id_plan=1;
	 		$id_tipo_usuario=1;
	 		$id_pais="00";
	 		$nombre=$nombre_apellido;
	 		$id_moneda="1";
	 		$ocupacion=" Definir Ocupacion";
	 		$direccion= "Definir Ciudad";
	 		$telf="definir Telf";
	 		$login=$user_profile['email'];
	 		$clave=$user_profile['id'];
	 		$clave_2 = do_hash($clave); // SHA1
	 		$sobre_mi="defina su perfil como usuario";
	 		$imagen="image.png";
	 		$id_ciudad="definir ciudad";
	 		$fecha_registro=date('y-m-d');
	 		$suscribirse="1";
	 		$id_status_usuario="0";
	 		$costo_hora="0";
	 		$data_perfil=$this->perfil_model->get_perfil_id($id_perfil);
			foreach ($data_perfil->result() as $data) {
				$num_propuesta=$data->num_propuesta;
			}
			$this->usuario_model->guardar_usuario($id_perfil,$id_tipo_usuario,$id_plan,$id_pais, $id_ciudad, $id_moneda, $nombre,$ocupacion,$direccion,$telf,$login,$clave_2,$sobre_mi,$imagen,$fecha_registro, $num_propuesta,$suscribirse,$id_status_usuario, $costo_hora);
			redirect('login/iniciar_sesion_post','refresh');
	 		}
	 	} catch (FacebookApiException $e) {
	 		echo $e;
                $user=null;
	 	}
	 }
	 public function iniciar_sesion_post_sin_facebook(){
	 	if($this->input->post()) {
			$nombre = $this->input->post('txt_login');
			$contrasena = $this->input->post('txt_pass');
			$con_hash= do_hash($contrasena);
			$usuario = $this->usuario_model->login($nombre, $con_hash);
       if ($usuario) {
          $usuario_data = array(
             'id' => $usuario->id,
             'nombre' => $usuario->nombre,
             'id_perfil' => $usuario->id_perfil,
             'id_tipo_usuario' => $usuario->id_tipo_usuario,
             'logueado' => TRUE,
             'imagen'=>$usuario->imagen
          );
          $this->session->set_userdata($usuario_data);
          $id_status_usuario=2;
	 				$this->usuario_model->actualizar_usuario_status($usuario_data['id'],$id_status_usuario);
          redirect('login/logueado');
    	 	}else{
    	 	$this->session->set_flashdata('alerta', 'Login o Password Invalidos');
       		 redirect('login', 'refresh');
   		  	}
	      }else{
	         $this->index();
   	 	  }
	 }
  	   public function logueado() {
			if($this->session->userdata('logueado')){
				redirect('principal','refresh');
			}else{
				redirect('login/index');
			}
  		}
   	 public function cerrar_sesion() {
   	 	if($this->session->userdata('logueado')){
   	 		$usuario_data = array(
         'logueado' =>false
      );
    $id_usuario=$this->session->userdata('id');
    $id_status_usuario=1;
	 		$this->usuario_model->actualizar_usuario_status( $id_usuario ,$id_status_usuario);
     $this->session->sess_destroy();
      session_destroy();
      redirect('login/logout');
   	 	}

   }
   public function iniciar_sesion_facebook(){
   	$logout=$this->facebook->getLogoutUrl(array('next'=>base_url().'login/logout'));
           echo "<a href='$logout'>Logout</a>";
           	echo "si se logueo";
   	exit();
    if ($this->user) {
		redirect('login/iniciar_sesion_facebook');
	}else{
	$data_login['login']=$this->facebook->getLoginUrl(array("scope"=>'email'));
	#,'redirect_uri' => 'http://localhost/freelance/login'
	$this->load->view('login/index');
	$this->load->view('modal/modal_login',$data_login);
	$this->load->view('modal/modal_nuevo_usuario',$data);
	}
   }
   public function logout(){
        session_destroy();
        redirect(base_url().'');
    }
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>