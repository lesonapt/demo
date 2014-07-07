<?php
    class Mod_chartstatic extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
  

    // get all spend
    function md_getAllSpend($params) {
        $this->db->select('id, money, user_total, user_id, create_date');
        $this->db->from('spend');
        $this->db->where($params); 
        return $this->db->get(); 
    }
    // query function
    function md_query($sql) {
        return $this->db->query($sql);   
    }
    
    

    // end code create by lesonapt
}
?>