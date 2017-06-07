<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
 
	class Autocomplete_agents extends CI_Controller { 
	  
		public function __construct(){
			parent:: __construct();
			$this->load->model("admin/autoagents_model");
			$this->load->helper('url');
			$this->load->helper('form');
		}
			  
		public function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$this->load->view('admin/common/header_2');
				$this->load->view('admin/agents');
				$this->load->view('admin/common/footer_2');
			}
		}
			  
		public function lookup(){
			// process posted form data
			$keyword = $this->input->post('term');
			$data['response'] = 'false'; //Set default response
			$query = $this->autoagents_model->lookup($keyword); //Search DB
			if( ! empty($query) ){
				$data['response'] = 'true'; //Set response
				$data['message'] = array(); //Create array
				foreach( $query as $row ){
					$data['message'][] = array( 
						'id'=>$row->id,
						'value' => $row->name,
						''
					);  //Add a row to array
				}
			}
			if('IS_AJAX'){
				echo json_encode($data); //echo json string if ajax request
				  
			}else{
				$this->load->view('admin/agents',$data); //Load html view of search results
			}
		}
	}
?>