<?php
	class Users_model extends CI_MODEL{
		
		function __construct(){
			parent::__construct();
			$this->table = 'users';
		}
		
		//Login
		function login($name, $pass){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('name', $name);
			$this->db->where('pass', MD5($pass));
			$this->db->limit(1);
			
			$query = $this->db->get();
			if($query->num_rows() == 1){
				$this->db->where('name', $name);
				$this->db->where('pass', MD5($pass));
				$this->db->update($this->table, array('last_date' => date('Y-m-d')));
				return $query->result();
			}else{
				return false;
			}
		}
		
		//Search Agents
		function search_agents($agent_name){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->like('name',$agent_name);
			$this->db->where('status','agent');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();	//normal array
			}else{
				return false;
			}
		}
		
		//Agents List
		function list_agents(){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('status','agent');
			$this->db->order_by('name','asc');
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();	//normal array
			}else{
				return false;
			}
		}
		
		//Agent Get Profile
		function get_agent($agent_id){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id',$agent_id);
			$this->db->where('status','agent');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		//Seller Get Profile
		function get_seller($seller_id){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id',$seller_id);
			$this->db->where('status','seller');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		//Seller Add
		function add_seller($data_seller){
			//Check Duplicate
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email',$data_seller['email']);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$seller_id = $query->result_array();
				$data_seller['id'] = $seller_id[0]['id'];
				//Update Info
				$this->db->where('email',$data_seller['email']);
				$this->db->update($this->table,$data_seller);
				return $data_seller;
			}else{
				//INSERT Seller
				$result = $this->db->insert($this->table,$data_seller);
				//GET Last Inserted ID
				$seller_id = $this->db->insert_id();
				$data_seller['id'] = $seller_id;
				return $data_seller;
			}
		}
		
		//Agent Add
		function add_agent($data_agent){
			//Check Duplicate
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email',$data_agent['email']);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return false;
			}else{
				//INSERT Agent
				$result = $this->db->insert($this->table,$data_agent);
				//GET Last Inserted ID
				return $result;
			}
		}
		
		//Agent Pic Add
		function add_agent_pic($agent_id,$pic){
			print_r($agent_id."-".$pic);exit;
			$this->db->where('id',$agent_id);
			$result = $this->db->update($this->table,$pic);
			return $result;
		}
		
		//Agent Update
		function edit_agent($data_new_agent,$agent_id){
			$this->db->where('id',$agent_id);
			$result = $this->db->update($this->table,$data_new_agent);
		}
		
		//Agent Pic Update
		function edit_agent_pic($agent_id,$pic){
			$this->db->where('id',$agent_id);
			$this->db->update($this->table,$pic);
		}
		
		//Agent Delete
		function delete_agent($agent_id){
			$this->db->where('id',$agent_id);
			$result = $this->db->delete($this->table);
			return $result;
		}
		
	}
?>