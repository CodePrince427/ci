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
				$result = $this->steps_model->list_steps();
				$data['listing_steps'] = $result;
				$data['steps_counter'] = count($result);
				
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
				$result = $this->steps_model->list_steps();
				$data['listing_steps'] = $result;
				$data['steps_counter'] = count($result);
				
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
				$data_step = array(
					'step_no'	=>	$this->input->post('no'),
					'step_name'	=>	$this->input->post('name'),
					'content'	=>	$this->input->post('content'),
					'video'		=>	$this->input->post('video')
				);
				$result = $this->steps_model->add_step($data_step);
				$step_id = $result['id'];
				
				redirect('admin/edit_step/'.$step_id.'');
			}
		}
		
		//Step View/Edit
		function edit_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$step_id = $this->uri->segment(3);
				//Listing Steps Info
				$result1 = $this->steps_model->get_listing_step($step_id);
				$data['listing_step'] = $result1;
				
				$result2 = $this->steps_model->list_steps();
				$data['listing_steps'] = $result2;
				$data['steps_counter'] = count($result2);
				
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
				$data_new_step = array(
					'step_no'	=> $this->input->post('no'),
					'step_name'	=> $this->input->post('name'),
					'content'	=> $this->input->post('content'),
					'video'		=> $this->input->post('video')
				);
				$result = $this->steps_model->edit_step($step_id,$data_new_step);
				redirect('admin/edit_step/'.$step_id.'');				
			}
		}
		
		//Step Delete
		function delete_step(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$step_id = $this->uri->segment(3);
				$result = $this->steps_model->delete_step($step_id);
				redirect('admin/steps');
			}
		}
		
	}
?>