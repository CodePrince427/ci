<?php
	class Code_model extends CI_MODEL{
		
		function __construct(){
			parent::__construct();
			$this->table = 'listings';
		}
		
		//Code Check
		function code($code){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('code', $code);
			$this->db->limit(1);
			
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}
		
	}
?>