<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mi_facebook extends CI_Controller {
    public $user=null;
    public function __construct()
    {
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
        $this->load->library('facebook', $array = array('appId' =>'1785983338296773
','secret'=>'e9f33ac91f639a618cfcf98c53953b6e' ));

        $this->user=$this->facebook->getUser();
    }
    public function index(){
/*      echo  $this->facebook->getLoginUrl();
    */
        if ($this->user) {
            try {
                $user_profile= $this->facebook->api('/me');
                echo "</br>";
                //echo $user_profile['name'];
               print_r($user_profile);
            } catch (FacebookApiException $e) {
                print_r(e);
                $user=null;
            }
        }
        if ($this->user) {
           $logout=$this->facebook->getLogoutUrl(array('next'=>base_url().'mi_facebook/logout'));
           echo "<a href='$logout'>Logout</a>";
        }else{
            $login=$this->facebook->getLoginUrl(array("scope"=>'email'));
              echo "<a href='$login'>Login</a>";
        }
    }
    public function logout(){
        session_destroy();
        redirect(base_url().'mi_facebook');
    }
}
/* End of file mi_facebook.php */
/* Location: ./application/controllers/mi_facebook.php */