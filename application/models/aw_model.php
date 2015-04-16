<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aw_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('actor_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_aw(){
		//Select table name
		$this->db->select("*");
		$this->db->from('actor_weight');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_ACTOR_WEIGHT', $id);
		$this->db->delete('actor_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('actor_weight');
		$this->db->where('ID_ACTOR_WEIGHT',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_ACTOR_WEIGHT',$id);
		$this->db->update('actor_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_uc_weight(){
		$this->db->select("*");
		$this->db->from('actor_weight');
		$query = $this->db->get();
		return $query;
	}
	
}

?>