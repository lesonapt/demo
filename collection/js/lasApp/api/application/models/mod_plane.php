<?php
    class Mod_plane extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
  
    // load plane by id
    function md_loadPlane($user_id) {
       $this->db->select('*');
       $this->db->from('planes');
       $this->db->where(array('owner_id' => $user_id));
       return $this->db->get();
    }
   // insert plane
   function md_insertPlane($data) {
        $this->db->insert('planes', $data); 
        $id = $this->db->insert_id();
        return $id;
   }
   //update plane
   function md_updatePlane($plane_id, $params) {    
        $this->db->where('id', $plane_id);
        $this->db->update('planes', $params); 
   }
   // query
    function md_query($sql) {
        return $this->db->query($sql);   
    }
    
// end code crete by lesonapt  
}
?>