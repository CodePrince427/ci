<?php
	class Steps_model extends CI_MODEL{
		
		function __construct(){
			parent::__construct();
			$this->table = 'listing_steps';
		}
		
		//Steps List
		function list_steps(){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->order_by('step_no','asc');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();	//normal array
			}else{
				return false;
			}
		}
		
		//Step Get Info
		function get_listing_step($step_id){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id',$step_id);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		//Step Add
		function add_step($data_step){
			$result = $this->db->insert($this->table,$data_step);
			//GET Last Inserted ID
			$step_id = $this->db->insert_id();
			$data_step['id'] = $step_id;
			return $data_step;
		}
		
		//Step Update
		function edit_step($step_id,$data_new_step){
			$this->db->where('id',$step_id);
			$result = $this->db->update($this->table,$data_new_step);
		}
		
		//Step Delete
		function delete_step($step_id){
			$this->db->where('id',$step_id);
			$result = $this->db->delete($this->table);
			return $result;
		}
		
	}
?>