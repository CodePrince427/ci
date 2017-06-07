<?php
	class Autoagents_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->table = 'users';
		}
		
		function lookup($keyword){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('status', 'agent');
			$this->db->like('name',$keyword,'after');
			$this->db->order_by("name", "asc");
			$query = $this->db->get();
			return $query->result();
		}
		
		function get_agents($search){
			$this->db->select('name');
			$this->db->like('name', $search);
			$query = $this->db->get($this->table);
			if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
					$row_set[] = htmlentities(stripslashes($row['name'])); //build an array
				}
				echo json_encode($row_set); //format the array into json data
			}
		}
	}
?>