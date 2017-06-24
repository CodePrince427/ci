
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Verify_Code extends CI_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/code_model');	//model loaded to access its functions
		}
		
		function index(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('code', 'Code', 'trim|callback_check_db');
			
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata("error", validation_errors());
				redirect('code', 'refresh');
			}else{
				$this->session->set_flashdata("success", validation_errors());
				
			}
		}
		
		function check_db($code){
			$result = $this->code_model->code($code);
			if($result){
				$listing_array = array();
				foreach($result as $row){
					$listing_array = array(
						'listing_id'	=>		$row->id, 
						'seller_id'		=>		$row->seller_id, 
						'agent_id'		=>		$row->agent_id, 
						'address'		=>		$row->address, 
						'city'			=>		$row->city,
						'state'			=>		$row->state,
						'zipcode'		=>		$row->zipcode,
						'price'			=>		$row->price,
						'step_id'		=>		$row->step_id
					);
					$this->session->set_flashdata('success', 'Correct Code');
					redirect('status/'.$code, 'refresh');
				}
			}else{
				$this->form_validation->set_message('check_db', 'Invalid Code');
				$this->session->set_flashdata('error', 'Invalid Code');
				redirect('code');
			}
		}
		
	}
?>