<?php
    class Mod_user extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function md_login($user_params) {
        $this->db->select('*');
        $this->db->from('user');
        //$this->db->join('modules', 'modules.id = detail_modules.module_id');
        // $this->db->like('user_tags', $user_tags); 
        $this->db->where($user_params); 
        return $this->db->get();
    }
    
    function md_registry($user_params_reg) {
        $user_exist = $this->help_check_exist($user_params_reg['email']);
        if( count($user_exist->result())== 0) {
            return $this->db->insert('user', $user_params_reg);
        } else {
            return 0;
        }
    }
    function help_check_exist($username){
        $query = 'select id from las_user where email = "'.trim($username).'"';
        return $this->db->query($query);
    }
    
    function md_load_room($user_id){
        $query = 'SELECT las_room.name, las_user_room.* FROM las_user_room
                LEFT JOIN las_room ON las_room.id = las_user_room.room_id
                WHERE las_user_room.user_id ='.$user_id;
        return $this->db->query($query);
    }
    
    function md_load_member_by_roomid($room_id){
        $query = 'SELECT las_user.*, las_user_room.owner, las_user_room.join_date  FROM las_user
                LEFT JOIN las_user_room ON las_user_room.user_id = las_user.id
                WHERE room_id ='.$room_id;
        return $this->db->query($query);
    }
    
    function md_load_invitations($user_id) {
        $this->db->select('invitations.id, invitations.user_id, invitations.room_id, name');
        $this->db->from('invitations');
        $this->db->join('room', 'room.id = invitations.room_id', 'left');
        $this->db->where(array('user_id' => $user_id)); 
        return $this->db->get();
    }
    
    
    function md_load_user_by_username($params) {
        $this->db->select('id, email, full_name');
        $this->db->from('user');
        $this->db->where($params); 
        return $this->db->get();
    }
    //
    function md_no_invi($params, $table) {
        $this->db->select('id');
        $this->db->from($table);
        $this->db->where($params); 
        return $this->db->get();
    }
    //
    function md_inv_to_room($params) {
        return $this->db->insert('invitations', $params); 
    }
    //
    function md_load_invitation_by_username_room($params) {
        $this->db->select('id');
        $this->db->from('invitations');
        $this->db->where($params); 
        return $this->db->get();
    }
    
    function md_del_inv_from_room($params) {
         return $this->db->delete('mytable', array('id' => $id));
    }
    
    function md_del_from_room($params) {
        return $this->db->delete('mytable', array('id' => $id)); 
    }
    
    function md_insert_to_room($params) {
        return $this->db->insert('mytable', $data);
    }
    
    function md_update_first_login($params) {
        $this->db->where('id', $params);
        $this->db->update('user', array('first_login' => 1)); 
    }
    
    // accept invi
    function md_acceptInvi($room_id, $user_id, $invi_id) {
        $this->md_injectInvi($invi_id);
        $data =  array(
              'room_id' => $room_id ,
              'user_id' => $user_id,
              'owner'   => 0
           );
        $this->db->insert('user_room', $data);
    }
    // inject invi
    function md_injectInvi($invi_id) {
         return  $this->db->delete('invitations',array('id' => $invi_id));
    }    
    // del member from room
    function md_delMember($params) {
        return $this->db->delete('user_room', $params);
    }
    // select member
    function md_selectMember($id) {
        $this->db->select('email, full_name');
        $this->db->from('user');
        $this->db->where('id', $id); 
        return $this->db->get();
    }
    // function update member
    function md_update($id, $params) {
        $this->db->where('id', $id);
        $this->db->update('user', $params); 
    }
   // function md_getGroupBy($user_tags) {
//        $this->db->select('*');
//         $this->db->from('spend');
//        $this->db->group_by("title"); 
//    }
}
?>