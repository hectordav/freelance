<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mi_facebook_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function datos_usuario()
    {
        $appId = '253990618284912';
        $secret = 'ed17d58c06018aa2e713aa25bcc6d55b';
        $fb_config = array(
            'appId' => $appId,
            'secret' => $secret
        );
        $this->load->library('facebook', $fb_config);
        //obtenemos el uid del usuario para mostrar los datos de él con getUser()
        $user = $this->facebook->getUser();
        if($user)
        {
            $fql  = 'SELECT uid,name,pic_square,email from user where uid="'.$user.'";';
            $datos  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            $resultado = $this->facebook->api($datos);
            return $resultado;
        }
    }
}
/*fin del modelo mi_facebook_model.php
*/