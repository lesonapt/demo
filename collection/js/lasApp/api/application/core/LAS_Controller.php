<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LAS_Controller extends CI_Controller
{
    protected $gb_lang;  
	public function __construct()
	{
	   parent::__construct();        
       $this->load->model('mod_user');
       $this->load->model('mod_spend');
       $this->load->model('mod_plane');
       $this->load->model('mod_room');
       $this->load->model('mod_chartstatic');

       $this->check_token();   
       $this->ajaxRequest();
	}
    public function ajaxRequest() {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
        } else {
            die("Error => No permission !!!");
        }
    }
    //function create_token(){
//        $token = md5(microtime(TRUE) . rand(0, 100000));        
//        $this->session->set_userdata('token', $token);
//        $this->session->set_userdata('token-expires', time() + 1800);  
//    } 
//    
    function check_token(){
        if(isset($_GET['token'])){
            $supplied_token = $_GET['token'];
            $token =  $this->session->userdata('token');
            $expires =  $this->session->userdata('token-expires');
            if ($expires < time() || $token != $supplied_token) {
                $this->session->set_userdata('token', NULL);
                echo json_encode(array('token' => false, 'error' =>'Invalid or expired token!'));
                die ();
            } else {
                //print $expires - time() ;                
            }
        } else {
            echo json_encode(array('token' => false, 'error' => 'invalid token'));
            die();
        }
    }
}