<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pais extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('preferencia_model');
			$this->load->model('mensaje_model');
			$this->load->model('propuesta_model');
			$this->load->model('pais_model');
	}
	public function index()
	{
		redirect('pais/grilla');
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
				$crud->set_table('t_pais_usuario');
				$crud->order_by('pais','asc');
				$crud->set_subject('Pais');
				$crud->set_language('spanish');
				$crud->display_as('cod','Codigo');
				$crud->display_as('pais','Pais');
				$crud->required_fields('cod','pais');
				$crud->unset_delete();
				$output = $crud->render();
if ($data['id_tipo_usuario']==1 || $data['id_tipo_usuario']==2) {
			redirect('login','refresh');
		}
		if ($data['id_tipo_usuario']==3) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$data);
				$this->load->view('../../assets/inc/menu_superior',$data);
				$this->load->view('pais/pais',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
		}
		}catch (Exception $e) {
		}
			}else{
			redirect('login');
			}
	}
	public function fill_ciudad() {
			$id_pais = $this->input->post('id_pais');
        if($id_pais){
            $id_pais_2 = $this->pais_model->get_ciudad($id_pais);
             echo '<option data-tokens=""value="">Seleccione Ciudad</option>';
            foreach($id_pais_2 as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->ciudad.'</option>';
            }
        }
          else {
           echo '<option data-tokens="0" value="0">Sin resultados</option>';
        }
    }
}
