<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
    public function index() {
        // Cargamos la librería
        $this->load->library('fbconnect');
        // Hizo el login con facebook?
        if($this->fbconnect->isLogedIn()) {
            // Mostramos primer nombre
            echo 'Hola ' . $this->fbconnect->userData()->first_name . '<br />';
            // Mostramos foto de perfil
            echo '<img src="' . $this->fbconnect->profilePic() . '"/><br />';
            // Mostramos el resto de los datos que nos entrega facebook
            echo '<pre>';
            print_r($this->fbconnect->userData());
            echo '</pre>';
        }
        // Si no ha hecho el login le mostramos el link
        else {
            echo anchor('/prueba/fblogin', 'Login con facebook');
        }
    }
    public function fblogin() {
        // Cargamos la librería
        $this->load->library('fbconnect');
        // Se hace el login, primer parámetro la dirección donde los devolverá y el segundo los "scopes" (Info adicional que queremos pedirle a facebook)
        $this->fbconnect->doLogin(site_url('http://localhost/freelance/prueba'), 'email');
    }
}