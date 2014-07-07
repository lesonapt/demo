<?php
    class Mod_room extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
  
    // insert spend
    function md_createRoom($room_info, $user_id) {
       $this->db->insert('room', $room_info);
       $id = $this->db->insert_id();
       $this->db->trans_complete();
       $this->md_insertDemoMemmber($id, $user_id);
       $this->md_addDemoSpend($id, $user_id);
       return $id;
    }
    // update spend
    function md_updateRoom($id,$params) {
        $this->db->where('id', $id);
        return $this->db->update('spend', $params); 
    }
    // del spend
    function md_delRoom($params) {
       return  $this->db->delete('spend',$params); 
    }
    // insert member to room
    function md_insertMember(){
         return $this->db->insert('spend', $user_tag);
    }
    // insert demo member
    function md_insertDemoMemmber($room_id, $user_id) {
        $data = array(
           array(
              'room_id' => $room_id ,
              'user_id' => $user_id,
              'owner'   => $user_id
           ),
           array(
              'room_id' => $room_id ,
              'user_id' => 1,
              'owner'   => 0
           ),
           array(
              'room_id' => $room_id ,
              'user_id' => 2,
              'owner'   => 0
           )
        );
        $this->db->insert_batch('user_room', $data); 
    }
       // function add demo spend
    function md_addDemoSpend($room_id, $user_id) {
        $today = new DateTime(); 
        $yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
        $yesterday_1  = mktime(0, 0, 0, date("m")  , date("d")-2, date("Y"));
        $data = array(
           array(
              'title' => 'Mua đồ ăn trưa (dữ liệu demo)' ,
              'user_tags' => '['.$user_id.'][1][2]',
              'money' => 45,
              'user_id' => 1,
              'room_id' => $room_id,
              'user_total' =>3,
              'create_date' => date_format($today, 'Y-m-d'),
              'update_date' => date_format($today, 'Y-m-d'),
              'status' => 0
           ),
           array(
              'title' => 'Đi uống trà đá (dữ liệu demo)' ,
              'user_tags' => '['.$user_id.'][2]',
              'money' => 20,
              'user_id' => $user_id,
              'room_id' => $room_id,
              'user_total' =>2,
              'create_date' => date('Y-m-d', $yesterday),
              'update_date' => date('Y-m-d', $yesterday),
              'status' => 0
           ),
           array(
              'title' => 'Mua đồ ăn sáng (dữ liệu demo)' ,
              'user_tags' => '[2][1]',
              'money' => 35,
              'user_id' => 1,
              'room_id' => $room_id,
              'user_total' =>2,
              'create_date' => date('Y-m-d', $yesterday),
              'update_date' => date('Y-m-d', $yesterday),
              'status' => 0
           ),
           array(
              'title' => 'Đi sinh nhật(dữ liệu demo)' ,
              'user_tags' => '['.$user_id.']',
              'money' => 105,
              'user_id' => 2,
              'room_id' => $room_id,
              'user_total' =>1,
             'create_date' => date('Y-m-d', $yesterday_1),
              'update_date' => date('Y-m-d', $yesterday_1),
              'status' => 0
           ),
           array(
              'title' => 'Mua đồ ăn đem(dữ liệu demo)' ,
              'user_tags' => '['.$user_id.'][2][1]',
              'money' => 85,
              'user_id' => $user_id,
              'room_id' => $room_id,
              'user_total' =>3,
              'create_date' => date('Y-m-d', $yesterday_1),
              'update_date' => date('Y-m-d', $yesterday_1),
              'status' => 0
           )
        );
        $this->db->insert_batch('spend', $data); 
    }

    // query function
    function md_query($sql) {
        return $this->db->query($sql);   
    }
    

    // end code create by lesonapt
}
?>