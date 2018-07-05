<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
class Lgeneral{
    private $paypal_settings = array(
        'username' => 'info_api1.freelance-employ.com',
        'password' => '65QTB2FCMXJSSRAY',
        'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ApNAWOdiX94g8kltdZaUDkF9kdOZ',
        'test_mode' => true);
    
    public function paypal_settings() {
        return $this->paypal_settings;
    }
}
?> 