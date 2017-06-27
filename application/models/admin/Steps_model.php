<?php
	class Steps_model extends CI_MODEL{
		
		function __construct(){
			parent::__construct();
			$this->table = 'listing_steps';
			$this->closing_table = 'closing_steps';
		}
		
		//Listing Steps List
		function listing_steps(){
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
		
		//Closing Steps List
		function closing_steps(){
			$this->db->select('*');
			$this->db->from($this->closing_table);
			$this->db->order_by('step_no','asc');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();	//normal array
			}else{
				return false;
			}
		}
		
		//Listing Step Get Info
		function get_listing_step($step_id){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id',$step_id);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		//Closing Step Get Info
		function get_closing_step($step_id){
			$this->db->select('*');
			$this->db->from($this->closing_table);
			$this->db->where('id',$step_id);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		//Listing Step Add
		function add_listing_step($data_step){
			$result = $this->db->insert($this->table,$data_step);
			//GET Last Inserted ID
			$step_id = $this->db->insert_id();
			$data_step['id'] = $step_id;
			return $data_step;
		}
		
		//Closing Step Add
		function add_closing_step($data_step){
			$result = $this->db->insert($this->closing_table,$data_step);
			//GET Last Inserted ID
			$step_id = $this->db->insert_id();
			$data_step['id'] = $step_id;
			return $data_step;
		}
		
		//Listing Step Update
		function edit_listing_step($step_id,$data_new_step){
			$this->db->where('id',$step_id);
			$result = $this->db->update($this->table,$data_new_step);
		}
		
		//Closing Step Update
		function edit_closing_step($step_id,$data_new_step){
			$this->db->where('id',$step_id);
			$result = $this->db->update($this->closing_table,$data_new_step);
		}
		
		//Listing Step Delete
		function delete_listing_step($step_id){
			$this->db->where('id',$step_id);
			$result = $this->db->delete($this->table);
			return $result;
		}
		
		//Closing Step Delete
		function delete_closing_step($step_id){
			$this->db->where('id',$step_id);
			$result = $this->db->delete($this->closing_table);
			return $result;
		}
		
	}
?>