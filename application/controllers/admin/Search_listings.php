<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Search_listings extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('admin/listings_model');
		}
		
		//Search Page
		public function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_name = $this->input->post('listings');
				
				$result1 = $this->listings_model->list_listings();
				$data['listing_list'] = $result1;
				
				$result2 = $this->listings_model->search_listings($listing_name);
				$data['listing_search'] = $result2;
				
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/search-listing',$data);
				$this->load->view('admin/common/footer_3');			
			}
		}
		
	}
?>