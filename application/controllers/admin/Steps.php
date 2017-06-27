<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Steps extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/steps_model');
		}
		
		function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				//Listing Steps
				$result1 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result1;
				$data['steps_counter1'] = count($result1);					

				//Closing Steps
				$result2 = $this->steps_model->closing_steps();
				$data['closing_steps'] = $result2;
				$data['steps_counter2'] = count($result2);
				
				//Views
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/steps', $data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		//Step Add
		function add_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				//Listing Steps
				$result1 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result1;
				$data['steps_counter1'] = count($result1);					

				//Closing Steps
				$result2 = $this->steps_model->closing_steps();
				$data['closing_steps'] = $result2;
				$data['steps_counter2'] = count($result2);
				
				//Views
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/add-step', $data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		function insert_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$process = $this->input->post('process');
				
				$data_step = array(
					'step_no'	=>	$this->input->post('no'),
					'step_name'	=>	$this->input->post('name'),
					'content'	=>	$this->input->post('content'),
					'video'		=>	$this->input->post('video')
				);
				
				if($process == 1){
					$result = $this->steps_model->add_listing_step($data_step);
					$step_id = $result['id'];
				}else{
					$result = $this->steps_model->add_closing_step($data_step);
					$step_id = $result['id'];
				}
				
				redirect('admin/edit_step/'.$step_id.'/'.$process.'');
			}
		}
		
		//Step View/Edit
		function edit_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$step_id = $this->uri->segment(3);
				$process = $this->uri->segment(4);

				//Listing Steps
				$result1 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result1;
				$data['steps_counter1'] = count($result1);					

				//Closing Steps
				$result2 = $this->steps_model->closing_steps();
				$data['closing_steps'] = $result2;
				$data['steps_counter2'] = count($result2);					
				
				if($process == 1){
					//Listing Step Info
					$result3 = $this->steps_model->get_listing_step($step_id);
					$data['listing_step'] = $result3;
				}else{
					//Closing Step Info
					$result4 = $this->steps_model->get_closing_step($step_id);
					$data['listing_step'] = $result4;
				}
				
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/view-step',$data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		//Step Update
		function update_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$step_id = $this->uri->segment(3);
				$process = $this->uri->segment(4);
				
				$data_new_step = array(
					'step_no'	=> $this->input->post('no'),
					'step_name'	=> $this->input->post('name'),
					'content'	=> $this->input->post('content'),
					'video'		=> $this->input->post('video')
				);
				
				if($process == 1){
					$result = $this->steps_model->edit_listing_step($step_id,$data_new_step);
					redirect('admin/edit_step/'.$step_id.'/'.$process.'');
				}else{
					$result = $this->steps_model->edit_closing_step($step_id,$data_new_step);
					redirect('admin/edit_step/'.$step_id.'/'.$process.'');
				}
			}
		}
		
		//Step Delete
		function delete_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$step_id = $this->uri->segment(3);
				$process = $this->uri->segment(4);
				
				if($process == 1){
					$result = $this->steps_model->delete_listing_step($step_id);
				}else{
					$result = $this->steps_model->delete_closing_step($step_id);
				}
				redirect('admin/steps');
			}
		}
		
	}
?>