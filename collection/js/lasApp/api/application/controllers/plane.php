<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Plane extends LAS_Controller {
    public function index(){}
    //load plane of user
    function load_planes(){
        if(isset($_GET['user_id'])){
            $data = $this->mod_plane->md_loadPlane($_GET['user_id']);
            if($data->result() != null) {
                $room =  $data->result();
                echo json_encode(array('planes' => $room));  
                exit();  
            } else {
                echo json_encode(array('planes' => null));
                exit();
            }
            return $data->result();
        } else {
            echo json_encode(array('error' => 'invalide user id'));
            die();
        } 
    }
    // create plane
    function create_plane() {
        if(isset($_GET['owner_id'])) {
            $data = array(
                'name' => $_GET['name'],
                'money' => $_GET['money'],
                'start_date' => $_GET['start_date'],
                'end_date' => $_GET['end_date'],
                'owner_id' =>$_GET['owner_id'],
                'type' =>0,
                'complete' => 0
            );
            $id = $this->mod_plane->md_insertPlane($data);
            echo json_encode(array('id' => $id ));
        } else{
            die();
        }
    }
    // function update_plane
    function update_plane() {
        if(isset($_GET['plane_id'])) {
            $data = array(
                'name' => $_GET['name'],
                'money' => $_GET['money'],
                'start_date' => $_GET['start_date'],
                'end_date' => $_GET['end_date'],
                'type' =>0,
                'complete' => 0
            );
            $id = $this->mod_plane->md_updatePlane($_GET['plane_id'], $data);
            echo json_encode(array('id' => $id ));
            
        } else {
            die();
        }
    }
    
    // load all spend in day plane
        function load_spend_for_plane(){
        if( isset($_GET['user_id'], $_GET['s_date'], $_GET['e_date']) ){
            $sql = 'SELECT *, sum(money/user_total) as person_money FROM las_spend '
                   .'where create_date >= "'.$_GET['s_date'].'" and create_date <= "'.$_GET['e_date'].'" and user_tags like "%['.$_GET['user_id'].']%" '
                   .' group by create_date';
            $data = $this->mod_plane->md_query($sql);            
            echo json_encode(array("data" => $data->result()));
            
        } else {
            echo json_encode(array('error' => 'invalide user id'));
            die();
        } 
    }
    
}

