<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends LAS_Controller {
    public function index(){}
    //load all room
    function load_room_of_user(){
        if(isset($_GET['user_id'])){
            $data = $this->mod_user->md_load_room($_GET['user_id']);
            if($data->result() != null) {
                $room =  $data->result();
                echo json_encode(array('rooms' => $room));  
                exit();  
            } else {
                echo json_encode(array('rooms' => null));
                exit();
            }
            return $data->result();
        } else {
            echo json_encode(array('error' => 'invalide user id'));
            die();
        } 
    }
    // load member by room id
    function load_user_by_room_id(){
        if(isset($_GET['room_id'])){
            $data = $this->mod_user->md_load_member_by_roomid($_GET['room_id']);
            if($data->result() != null) {
                $user =  $data->result();
                echo json_encode(array('user' => $user));  
                exit();  
            } else {
                echo json_encode(array('user' => null));
                exit();
            }
        } else {
            echo json_encode(array('error' => 'invalide room id'));
            die();
        }  
    }
    // load invitations
    function load_invitations_by_user_id() {
        if(isset($_GET['user_id']) && $_GET['user_id'] != '') {
            $data = $this->mod_user->md_load_invitations($_GET['user_id']);
            if($data->result() != null) {
                $invitations = $data->result();
                echo json_encode(array('error' =>false, 'exist' => true, 'inv_data' => $invitations));
            } else {
                echo json_encode(array('error' => false, 'exist'=> false));
            }
        } else {
            echo json_encode(array('error' => true));
            die();
        }
    }
    // update first login
    function update_first_login() {
        if(isset($_GET['user_id']) && $_GET['user_id'] != '') {
            $this->mod_user->md_update_first_login($_GET['user_id']);
        exit();
        } else {
            die('invalid user id');
        }
    }
    // check exist username
    function invitation_process() {
        if(isset($_GET['username'], $_GET['room_id'])) {
           $data =  $this->mod_user->md_load_user_by_username(array('email' => $_GET['username']));
           $user = $data->result();
           
          if(count($user) == 0) {
            echo json_encode(array('error' => true, 'code' => '#01'));
            die();
          } else {
            $data = $this->user_had_belong($_GET['room_id'], $user[0]->id, 'user_room');
                        
            if(count($data) == 0) {                
                $data = $this->user_had_belong($_GET['room_id'], $user[0]->id, 'invitations');          
                if(count($data) == 0) {
                    $data = $this->insert_invi_user_to_room($user[0]->id, $_GET['room_id']);
                    echo json_encode(array('error' => false, 'msg' => $user[0]->full_name));
                } else {
                    echo json_encode(array('error' => 'true' , 'code' => '#03'));
                    die();
                }               
            } else {
                echo json_encode(array('error' => 'true' , 'code' => '#02'));
                die();
            }
          }
           
        } else {
            echo json_encode(array('error' =>true));
            die();
        }
    }
    // function check user belong room
    function user_had_belong($room_id, $user_id, $belong){
        if(isset($room_id, $user_id)) {
            $data = $this->mod_user->md_no_invi(array('user_id' => $user_id, 'room_id' => $room_id), $belong);
            return $data->result();
        } else {
            echo json_encode(array('error' =>true));
            die();
        }
    }

    // function invi user to room   
    function insert_invi_user_to_room($user_id, $room_id) {
         if(isset($user_id, $room_id)) {
            return $this->mod_user->md_inv_to_room(array('user_id' => $user_id, 'room_id' => $room_id));         
        } else {
            die('error !!!');
        }        
    }
    // funtion check load all invitation by username
    function load_invi_by_username($username) {
        if($username) {
            $this->mod_user->md_inv_to_room($_GET['user_id']);
        } else {
            die('#0001');
        }
    }
    // user accept joint to room
    function invi_accept() {
        if(isset($_GET['room_id'], $_GET['user_id'], $_GET['invi_id'])) {
            $data =  $this->mod_user->md_acceptInvi($_GET['room_id'], $_GET['user_id'], $_GET['invi_id']);
        } else {
            die();
        }
    }
    // user inject joint to room
    function invi_inject() {
        if(isset($_GET['invi_id'])) {
            $data =  $this->mod_user->md_injectInvi($_GET['invi_id']);
        } else {
            die();
        }
    }
    // del member from room
    function member_del() {
        if(isset($_GET['memberId'], $_GET['roomId']) && $_GET['memberId'] && $_GET['roomId']) {
            $data = $this->mod_user->md_delMember(array('user_id' => $_GET['memberId'], 'room_id' => $_GET['roomId']));
            echo json_encode($data);
        } else {
            die();
        }
    }
    // function select member
    function select_member() {
        if(isset($_GET['userId']) && $_GET['userId']) {
            $data = $this->mod_user->md_selectMember($_GET['userId']);
            echo json_encode($data->result());
        } else {
            die();
        }
        
    }
    // function update member
    function update_member() {
        if(isset($_GET['userId'], $_GET['email'], $_GET['fullName'], $_GET['password'])) {
            $params = array('email' => $_GET['email'], 'full_name' => $_GET['fullName'], 'password' => md5($_GET['password']));
            $data = $this->mod_user->md_update($_GET['userId'], $params);
            echo json_encode($data);
        } else {
            die('error');
        }
    }
}

