<?php
	class Autolistings_model extends CI_Model{
		function lookup($keyword){
			$this->db->select('*');
			$this->db->from('listings');
			$this->db->like('address',$keyword,'after');
			$this->db->or_like('city',$keyword,'after');
			$this->db->or_like('state',$keyword,'after');
			$this->db->or_like('code',$keyword,'after');
			$query = $this->db->get();
			return $query->result();
		}
	}
?>