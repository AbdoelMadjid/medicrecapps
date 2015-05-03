<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert($data){
		$this->db->insert('pasien',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_pasien(){
		//Select table name
		$this->db->select("*");
		$this->db->from('pasien');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_pasien', $id);
		$this->db->delete('pasien');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('pasien');
		$this->db->where('id_pasien',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function get_data_rekam_medik_pasien($id){
		$this->db->select("*");
		$this->db->from('pasien');
		$this->db->join('rekam_medik', 'rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->where('pasien.id_pasien',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('id_pasien',$id);
		$this->db->update('pasien',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_pasien(){
		$this->db->select("*");
		$this->db->from('pasien');
		$query = $this->db->get();
		return $query;
	}
	
}

?>