<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Search_agents extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('admin/users_model');
		}
		
		//Search Page
		public function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$agent_name = $this->input->post('agents');
				
				$result1 = $this->users_model->list_agents();
				$data['agent_list'] = $result1;
				
				$result2 = $this->users_model->search_agents($agent_name);
				$data['agent_search'] = $result2;
				
				$this->load->view('admin/common/header_2');
				$this->load->view('admin/search-agent',$data);
				$this->load->view('admin/common/footer_2');			
			}
		}
		
	}
?>