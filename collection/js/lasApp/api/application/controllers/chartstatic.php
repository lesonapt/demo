<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chartstatic extends LAS_Controller {
    public function index(){}

    function load_spend(){
        if( isset($_GET['type'], $_GET['skin'], $_GET['room_id'], $_GET['user_id'], $_GET['year']) ){
            $sql = 'SELECT user_total, sum(money) as room_total, sum(money / user_total) as total, DAY(create_date) as date, MONTH(create_date) as month FROM las_spend ';
            $where = ' where room_id = '.$_GET['room_id'];
            $group =' GROUP BY MONTH(create_date), YEAR(create_date)';
            if($_GET['type'] == 1) {
               $where.=' and user_tags like "%['.$_GET['user_id'].']%" '; 
            } 
            
            $where.= ' and YEAR(create_date) = '.$_GET['year'];
            
            if($_GET['skin'] == 1) {
                $group =' GROUP BY create_date';
                if(isset($_GET['month'])) {
                    $where.=' and MONTH(create_date) = '.$_GET['month'];    
                }
            } 
            $where.=$group;
            $sql.=$where;
            $data = $this->mod_chartstatic->md_query($sql);            
            echo json_encode(array("data" => $data->result()));
            
        } else {
            echo json_encode(array('error' => 'invalide user id'));
            die();
        } 
    }
    
}

