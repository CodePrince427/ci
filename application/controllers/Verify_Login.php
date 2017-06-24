<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Verify_Login extends CI_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/users_model');	//model loaded to access its functions
		}
		
		function index(){
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('name', 'Name', 'trim');
			$this->form_validation->set_rules('pass', 'Password', 'trim|callback_check_db');
			
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata("error", validation_errors());
				redirect('admin', 'refresh');
			}else{
				$this->session->set_flashdata("success", validation_errors());
				
			}
		}
		
		function check_db($pass){
			$name = $this->input->post('name');
			$result = $this->users_model->login($name, $pass);
			if($result){
				$session_array = array();
				foreach($result as $row){
					$session_array = array(
						'id'		=>		$row->id, 
						'email'		=>		$row->email, 
						'user'		=>		$row->name,
						'pass'		=>		$row->pass,
						'status'	=>		$row->status
					);
					$this->session->set_userdata('log_in', $session_array);
					$this->session->set_flashdata('success', 'Login Successfull');
					if($session_array['status'] == 'admin' OR $session_array['status'] == 'manager'){
						redirect('admin/listings', 'refresh');					
					}else{
						redirect('code', 'refresh');					
					}
				}
			}else{
				$this->form_validation->set_message('check_db', 'Invalid Username or Password');
				$this->session->set_flashdata('error', 'Invalid Username or Password');
				redirect('admin');
			}
		}
		
	}
?>