<?php
    class Mod_spend extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
  
    // insert spend
    function md_addSpend($user_tag) {
       return $this->db->insert('spend', $user_tag);
    }
    // update spend
    function md_updateSpend($id,$params) {
        $this->db->where('id', $id);
        return $this->db->update('spend', $params); 
    }
    // update status
    function md_updateStatus($room_id) {
        $this->db->where(array('room_id' => $room_id));
        return $this->db->update('spend', array('status' => 1)); 
    }
    // del spend
    function md_delSpend($params) {
       return  $this->db->delete('spend',$params); 
    }
    // tong ket room
    function md_endSpendRoom($id) {
        
    }
    // get all spend
    function md_getAllSpend($params) {
        $this->db->select('*');
        $this->db->from('spend');
        $this->db->where($params); 
        return $this->db->get(); 
    }
    // function select max -min date spend
     function md_max_min_spend($params) {
        $this->db->select(' max( create_date ) as max_date, min( create_date ) as min_date');
        $this->db->from('spend');
        $this->db->where($params); 
        return $this->db->get(); 
    }
    // function select max -min date spend
    function md_history($params) {
        $this->db->select('*');
        $this->db->from('history');
        $this->db->where($params); 
        //$this->db->order_by("course_name","desc");
        return $this->db->get(); 
    }
    // function insert history
    function md_AddHistory($history) {
       return $this->db->insert('history', $history);
    }
    // query function
    function md_query($sql) {
        return $this->db->query($sql);   
    }
    
    
    
    // ====================================================================
    function md_getAll($user_tags) {
        $this->db->select('*');
        $this->db->from('spend');
        //$this->db->join('modules', 'modules.id = detail_modules.module_id');
         $this->db->like('user_tags', $user_tags); 
        //$this->db->where('status', $status); 
        return $this->db->get();
       // return $this->db->get('modules');
    }
    function md_getGroupBy() {
        $this->db->select('*');
        $this->db->from('spend');
        $this->db->group_by("title"); 
        return $this->db->get(); 
    }
    // end code create by lesonapt
}
?>