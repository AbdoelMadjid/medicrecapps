<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uc_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('uc_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_uc(){
		//Select table name
		$this->db->select("*");
		$this->db->from('uc_weight');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	function select_max_id_uc(){
		//Select table name
		$this->db->select_max("ID_UC_WEIGHT");
		$this->db->from('uc_weight');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_uc_weight', $id);
		$this->db->delete('uc_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('uc_weight');
		$this->db->where('ID_uc_weight',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('id_uc_weight',$id);
		$this->db->update('uc_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_uc_weight(){
		$this->db->select("*");
		$this->db->from('uc_weight');
		$query = $this->db->get();
		return $query;
	}
	
}

?>