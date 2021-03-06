<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('user',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_user(){
		//Select table name
		$this->db->select("*");
		$this->db->from('user');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	
	function get_data_user_request(){
		$this->db->select("*");
		$this->db->from('user');
		$this->db->where('status',0);
		$query = $this->db->get();
		return $query;
	}
	
	
	function delete($id){
		$this->db->where('ID_user', $id);
		$this->db->delete('user');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('user');
		$this->db->where('ID_user',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_user(){
		$this->db->select("*");
		$this->db->from('user');
		$query = $this->db->get();
		return $query;
	}
	
}

?>