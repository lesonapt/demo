<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Room extends LAS_Controller {
    public function index(){}
    
    function insert_room() {
        if(isset($_GET['room_name'], $_GET['user_id']) && $_GET['room_name']!= null && $_GET['user_id']!= null) {
            $data =  $this->mod_room->md_createRoom(array('name' => trim($_GET['room_name']) ), $_GET['user_id']);
            echo json_encode($data);
        } else {
            die(0);
        }
    }

    function date() {
        $datetime = new DateTime(); 
        echo date_format($datetime, 'Y-m-d');
        $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")-29, date("Y"));
        echo date("Y-m-d",$tomorrow);
    }

}
