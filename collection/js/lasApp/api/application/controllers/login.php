<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function index(){
        die('Login with username and password');    
    }

    function dolog(){
        $this->load->model('mod_user');
        if(isset($_GET['email'], $_GET['password'])){
            $data = $this->mod_user->md_login(array('email' =>trim($_GET['email']), 'password' =>md5($_GET['password'])));
            if($data->result() != null) {
                $this->create_token();
                $token =  $this->session->userdata('token');
                $user =  $data->result();                
                echo json_encode(array('login' => true, 'user_info' => $user[0], 'token' => $token));    
            } else {
                echo json_encode(array('login' => false, 'error' => 'invalide username or password'));
                die();
            }
        } else {
            echo json_encode(array('login' => false));
            die();
        }  
    }
    
    function regitry(){
        $this->load->model('mod_user');
        if(isset($_GET['email'], $_GET['password'], $_GET['fullname']) && $_GET['email'] != '' && $_GET['password'] != '' && $_GET['fullname'] != '') {
            $data = array('email' => $_GET['email'], 'password' => md5($_GET['password']), 'full_name' => $_GET['fullname']);
            $rg = $this->mod_user->md_registry($data);
            if($rg == 1) {
                $data = $this->mod_user->md_login(array('email' =>trim($_GET['email']), 'password' =>md5($_GET['password'])));
                $this->create_token();
                $token =  $this->session->userdata('token');
                $user =  $data->result();
                echo json_encode(array('success' => true, 'exist' => false, 'user_info' => $user[0], 'token' => $token ));
            } else {
                echo json_encode(array('success' => true, 'exist' => true));
            }
            die();
            
        } else {
            echo json_encode(array('success' => false));
            die();
        }
    }
    
    function create_token(){
        $token = md5(microtime(TRUE) . rand(0, 100000));        
        $this->session->set_userdata('token', $token);
        $this->session->set_userdata('token-expires', time() + 1800);  
    } 
    
    function refresh_token(){
        if(isset($_GET['token'])){
            $supplied_token = $_GET['token'];
            $token =  $this->session->userdata('token');
            $expires =  $this->session->userdata('token-expires');
            if ($expires < time() || $token != $supplied_token) {
                $this->session->set_userdata('token', NULL);
                echo json_encode(array('token' => false, 'error' =>'Invalid or expired token!'));
                die ();
            } else {
                echo json_encode(array('token' => true, 'time_cookie' => $expires-time())); 
                exit();            
            }
        } else {
            echo json_encode(array('token' => false, 'error' =>'token is request'));
            die();
        }
    } 

    
}

