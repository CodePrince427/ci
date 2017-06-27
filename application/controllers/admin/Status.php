<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Status extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/status_model');
			$this->load->model('admin/steps_model');
		}
		
		function index(){
			$listing_code = $this->uri->segment(2);
			$result1 = $this->status_model->get_listing($listing_code);
			$data['listing'] = $result1;
			if($data['listing'] == array()){
				redirect('code');
			}else{
				$data['listing'] = $result1;
				$data['listing_code'] = $listing_code;
				
				//Listing Pic
				$listing_id = $data['listing'][0]['id'];
				$result2 = $this->status_model->get_listing_pic($listing_id);
				$data['listing_pic'] = $result2;
				
				//Listing Gallery
				$result3 = $this->status_model->get_listing_gallery($listing_id);
				$data['listing_gallery'] = $result3;
				$data['pic_counter'] = count($result3);
				
				//Agent Info
				$agent_id = $data['listing'][0]['agent_id'];
				$result4 = $this->status_model->get_agent($agent_id);
				$data['agent'] = $result4;
				
				//Seller Info
				$seller_id = $data['listing'][0]['seller_id'];
				$result5 = $this->status_model->get_seller($seller_id);
				$data['seller'] = $result5;
				
				//PDFs
				$result6 = $this->status_model->get_pdf($listing_id);
				$data['listing_pdf'] = $result6;
				$data['pdf_counter'] = count($result6);
				
				//Listing Steps Info
				$step_id = $data['listing'][0]['step_id'];
				$process = $data['listing'][0]['process'];
				if($process == 'Listing Process'){
					$result7 = $this->steps_model->get_listing_step($step_id);
					$data['listing_step'] = $result7;
					
					$result8 = $this->steps_model->listing_steps();
					$data['listing_steps'] = $result8;
					$data['steps_counter'] = count($result8);					
				}else{
					$result7 = $this->steps_model->get_closing_step($step_id);
					$data['listing_step'] = $result7;
					
					$result8 = $this->steps_model->closing_steps();
					$data['listing_steps'] = $result8;
					$data['steps_counter'] = count($result8);
				}
				
				//Views
				$this->load->view('admin/common/header_5');
				$this->load->view('admin/status', $data);
				$this->load->view('admin/common/footer_5');
			}
		}
	}
?>