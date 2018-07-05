<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paypal_params extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->helper('url');
            $this->load->database();
            $this->load->library('grocery_crud');
        //  $this->load->library('merchant');
        $this->load->library('lgeneral');
    }
    public function index()
    {
    }
    public function comprar() {
    $this->load->library('merchant');
    $this->load->library('lgeneral');
    $this->merchant->load('paypal_express');
    $settings = $this->merchant->default_settings();
    $settings = $this->lgeneral->paypal_settings();
    $this->merchant->initialize($settings);
    $params = $this->paypal_params();
    $response = $this->merchant->purchase($params);
}
private function paypal_params() {
    $this->load->helper('url');
    $params = array(
        'amount' => 10.54, //El importe total de la compra
        'currency' => 'EUR',
        'return_url' => site_url() . ' nombre_de_tu_controlador /correcto', //Si la compra es un éxito nos derivará a esta página
        'description' => 'Compra de artículos de prueba', //La descripción del producto
        'cancel_url' => site_url() . 'nombre_de_tu_controlador /incorrecto'); //Si la compra falla nos derivará a esta página
}
public function correcto() {
    $this->load->library('merchant');
    $this->load->library('lgeneral');
    $this->merchant->load('paypal_express');
    $settings = $this->lgeneral->paypal_settings();
    $this->merchant->initialize($settings);
    $params = $this->paypal_params();
    $response = $this->merchant->purchase_return($params);
    if ($response->success()) {
        $paypal = $response->reference();
        //Aquí generaremos el pedido
    } else {
        $this->incorrecto();
    }
}
public function incorrecto(){
    echo "Lo sentimos mucho, el proceso de compra ha fallado";
}
}
