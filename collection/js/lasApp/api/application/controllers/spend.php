<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Spend extends LAS_Controller {
	public function index(){} 
    

    function add_spend() {
        if(isset($_GET['user_tags'], $_GET['room_id'])) {
            $string = $this->order_user_tags($_GET['user_tags']);
            if($string['user_total'] !=0) {
                $spend_params = array(
                     'user_tags'     => $string['user_tags'],
                     'room_id'       => $_GET['room_id'], 
                     'user_total'    => $string['user_total'],
                     'money'         => $_GET['money'],
                     'title'         => $_GET['title'],
                     'create_date'   => $_GET['date'],
                     'user_id'       => $_GET['user_id']
                );
                $result = $this->mod_spend->md_addSpend($spend_params);
                echo json_encode(array('result' => $result));
            } else {
                
            }
            //echo json_encode(array('error' => false, 'msg' => $string['user_tags'], 'user_total' => $string['user_total']));
        } else {
            echo json_encode(array('error' => true, 'message' => 'not allowed'));
        }
    }
    
    function update_spend() {
        if(isset($_GET['user_tags'], $_GET['spend_id'])) {
            $string = $this->order_user_tags($_GET['user_tags']);
            if($string['user_total'] !=0) {
                $spend_params = array(
                     'user_tags'     => $string['user_tags'],
                     'user_total'    => $string['user_total'],
                     'money'         => $_GET['money'],
                     'title'         => $_GET['title'],
                     'create_date'   => $_GET['date'],
                     'user_id'       => $_GET['user_id']
                );
                $result = $this->mod_spend->md_updateSpend($_GET['spend_id'], $spend_params);
                echo json_encode(array('result' => $result));
            } else {
                
            }
        } else {
            echo json_encode(array('error' => true, 'message' => 'not allowed'));
        }
    }   
    
    function update_status() {
        if(isset($_GET['room_id'], $_GET['min_date'])) {
            $data = $this->mod_spend->md_updateStatus($_GET['room_id'], $_GET['min_date']);
            echo json_encode($data);
        } else {
            echo json_encode(array('error' => true, 'message' => 'not allowed'));
        }
    }
    
    function del_spend(){
        if(isset($_GET['spend_id']) && $_GET['spend_id'] !=0) {
           $data = $this->mod_spend->md_delSpend(array('id' => $_GET['spend_id']));
           echo json_encode($data); 
        } else {
            die();
        }
    }
   
    function get3month() {
       if(isset($_GET['start_date'], $_GET['end_date'], $_GET['room_id'])) {
            $query = 'SELECT * FROM las_spend WHERE room_id = '.$_GET['room_id']
            .' and create_date BETWEEN "'.$_GET['start_date'].'" AND "'.$_GET['end_date'].'"  ';
            if(isset($_GET['status'])) {
                $query.=' and status = '.$_GET['status'];
            }
           $data = $this->mod_spend->md_query($query);
           echo json_encode($data->result());
       } else {
            die();
       }
    }
    
    function getPlaneSpend() {
        if(isset($_GET['start_date'], $_GET['end_date'], $_GET['owner_id'])) {
            $query = '';
            if( isset($_GET['type']) && $_GET['type'] == 0) {
                $query = 'SELECT title,money,user_total, create_date, sum(money) as total FROM las_spend'.
                         ' where room_id = '.$_GET['owner_id'].' and create_date >= "'.$_GET['start_date'].'" and create_date <= "'.$_GET['end_date'].'"'.
                         ' group by create_date';
            } else {
                $query = 'SELECT title,money,user_total, create_date, sum(money) as total FROM las_spend'.
                         ' where user_tags like "%['. $_GET['owner_id'].']%" and create_date >= "'.$_GET['start_date'].'" and create_date <= "'.$_GET['end_date'].'"'. 
                         ' group by create_date';
                                        
            }
            
            $data = $this->mod_spend->md_query($query);
            echo json_encode($data->result());
        } else {
            die();
        }
    }
   // get all spend by status
    function getallSpend() {
        //$this->ajaxRequest();
       	if(isset($_GET['room_id'])) {
            $params = array('room_id' => $_GET['room_id'] );
            $params['status'] = 0;
            if(isset( $_GET['status'])) {
                $params['status'] = $_GET['status'];
            }
            $data = $this->mod_spend->md_getAllSpend($params);
            echo json_encode($data->result());
        } else {
            die();
        }
    }
    
    // get max min spend date
    function getMaxMinDateSpend() {
        if(isset($_GET['room_id'])) {
            $params = array('room_id' => $_GET['room_id'], 'status' =>0 );
            $data = $this->mod_spend->md_max_min_spend($params);
            echo json_encode($data->result());
        } else {
            die();
        }
    }
    // function load history
    function getHistory() {
         if(isset($_GET['room_id'])) {
            $params = array('room_id' => $_GET['room_id']);
            $data = $this->mod_spend->md_history($params);
            echo json_encode($data->result());
        } else {
            die();
        }
    }
    // function insert history
    function insertHistory() {
        if(isset($_GET['room_id'], $_GET['s_date'], $_GET['e_date'], $_GET['money'])) {
            $params = array(
                'start_date' => $_GET['s_date'], 
                'end_date'   => $_GET['e_date'],
                'money'      => $_GET['money'],
                'room_id'    => $_GET['room_id']
            );
            $data = $this->mod_spend->md_AddHistory($params);
            echo json_encode($data);
        } else {
            die();
        }
    }
   
   // function getall(){        
//        if(isset($_GET["user_tags"], $_GET['room_id'])) {
//            $data = $this->mod_spend->md_getAll($_GET["user_tags"]);
//            $own_money = 0;    
//            $spend_money =0;
//            foreach($data->result()as $spend){
//                $spend_money += ($spend->money)/($spend->user_total);
//                if($spend->user_id == 1){$own_money+=$spend->money;}
//                echo $spend->money.'---'.$spend->user_total.'---'.$spend->user_id.'<br>';
// 
//            }  
//            echo 'have : '.$own_money.'</br>';
//            echo 'spend : '.$spend_money.'</br>';
//            $k = $own_money-$spend_money;
//            echo '->: '.$k.'</br>';
//        } else {
//            echo json_encode(array('error' => true, 'message' => 'not allowed'));
//        }
//    }
    
    function getorderby() {
        $_GET["user_tags"];
    }
    
    function order_user_tags($string) {
        $uri = explode('-', $string);
        $user_tags = '';
        $user_total =0;
        for($i=0; $i< count($uri); $i++) {
            $user_total++;
            $user_tags.='['.$uri[$i].']';
        }
        return array('user_tags' => $user_tags, 'user_total' => $user_total);
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */