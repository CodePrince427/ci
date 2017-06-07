<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/users_model');
		}
		
		//Login Section
		public function index(){
			if($this->session->userdata('log_in') == ''){
				$this->load->helper(array('form'));
				$this->load->view('admin/common/header_1');
				$this->load->view('admin/sign-in');
				$this->load->view('admin/common/footer_1');
			}else{
					redirect('admin/listings');
			}
		}
		
		//Logout Section
		public function logout(){
			unset($this->session->userdata);
			$this->session->userdata=array();
			$this->session->sess_destroy();
			redirect('admin', 'refresh');
		}
	}
?>