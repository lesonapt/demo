<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LAS_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database(); 
	}
	//test
	public function test(){
		$this->db->from($this->_params['_table']);  
		$this->db->select($this->_params['_select']); 		
		$n = count($this->_params['_join']);
		for ($i=0;$i<$n;$i++){
			$this->db->join($this->_params['_join'][$i][0],$this->_params['_join'][$i][1],$this->_params['_join'][$i][2]);
		}
	
		$query = $this->db->get(); 
		return $query->result();
	}
	
	// delete
	public function delete()
		{
			if(isset($this->_params['_table'])&&isset($this->_params['_where'])){
				$this->db->delete($this->_params['_table'],$this->_params['_where']); 
			}
		}
	// select 	
	public function select(){
		$data = array();
		if(isset($this->_params['_select'])){
			$this->db->select($this->_params['_select']); 
		}
		if(isset($this->_params['_table'])){
			$this->db->from($this->_params['_table']);  
		}
		if(isset($this->_params['_join'])){
			$n = count($this->_params['_join']);
			for ($i=0;$i<$n;$i++){
				$this->db->join($this->_params['_join'][$i][0],$this->_params['_join'][$i][1],$this->_params['_join'][$i][2]);
			}
		}
		if(isset($this->_params['_where'])){
			$this->db->where($this->_params['_where']); 
		}
		if(isset($this->_params['_like'])){
			for($i=0;$i<count($this->_params['_like']);$i++){
				$this->db->like($this->_params['_like'][$i][0], $this->_params['_like'][$i][1]);
			}
		}
		if(isset($this->_params['_order'])){
			$this->db->order_by($this->_params['_order'][0],$this->_params['_order'][1]); 
		}
		if(isset($this->_params['_limit'])){
			$data['data'] =  $this->db->get(null,$this->_params['_limit'][0],$this->_params['_limit'][1]); 
			if(isset($this->_params['_where'])||isset($this->_params['_like'])){
				$this->_params['_where'] = (isset($this->_params['_where']))? $this->_params['_where']:null;
				$this->_params['_like'] = (isset($this->_params['_like']))? $this->_params['_like']:null;
				$data['total'] =  $this->total($this->_params['_table'],$this->_params['_where'],$this->_params['_like']);
			}
			else{
				$data['total'] = $this->db->count_all($this->_params['_table']); 
			}
		}
		else{
			$data['data']  =   $this->db->get(); 
			$data['total'] =   $this->db->count_all($this->_params['_table']);
		}
		return $data;
	}	

	//total
	public function total($table,$where,$like){
		if($where!=null){$this->db->where($where);}
		if($like!=null){
			for($i=0;$i<count($like);$i++){
				$this->db->like($like[$i][0],$like[$i][1]);
			}
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	//insert 
	public function insert(){
		if(isset($this->_params['_table'])&&isset($this->_params['_data'])){
			return $this->db->insert($this->_params['_table'],$this->_params['_data']); 
		}
		else{return false;}
	}
	//update
	public function update(){
		if(isset($this->_params['_table'])&&isset($this->_params['_data'])&&isset($this->_params['_where'])){
			$this->db->where($this->_params['_where'][0],$this->_params['_where'][1]);
			return $this->db->update($this->_params['_table'], $this->_params['_data']); 
		}
	}
	// update 2
	public function update2(){
		if(isset($this->_params['_table'])&&isset($this->_params['_data'])&&isset($this->_params['_where'])){
			$where = $this->_params['_where'];
			return $this->db->update($this->_params['_table'], $this->_params['_data'],$where); 
		}
	}
	// select multi
	public function selectmulti(){
		$sql =null;
		if(isset($this->_params['_select'])){
			$sql .= 'select '.$this->_params['_select'];
		}
		if(isset($this->_params['_table'])){
			$sql .= ' from '.$this->_params['_table'];
		}
		if(isset($this->_params['_where'])){
			$sql .= ' where '.$this->_params['_where'];
		}
		if(isset($this->_params['_order'])){
			$sql .= ' ORDER BY '.$this->_params['_order'];
		}
		if(isset($this->_params['_limit'])){
			$sql .= ' limit '.$this->_params['_limit'];
		}
		$query = $this->db->query($sql); 
		return $query->result();
	}
	// querystring
	public function queryString($string){
		return $this->db->query($string); 
	}
}