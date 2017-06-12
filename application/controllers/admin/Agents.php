<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Agents extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/autoagents_model');
			$this->load->model('admin/users_model');
		}
		
		function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$result = $this->users_model->list_agents();
				$data['agent_list'] = $result;
				
				//Views
				$this->load->view('admin/common/header_2');
				$this->load->view('admin/agents',$data);
				$this->load->view('admin/common/footer_2');
			}
		}
		
		//Autocomplete Agents
		function get_agents(){
			if(isset($_GET['agents'])){
				$search = strtolower($_GET['agents']);
				$this->autoagents_model->get_agents($search);
			}
		}
		
		//Agent View/Edit
		function edit_agent(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$agent_id = $this->uri->segment(3);
				$result = $this->users_model->list_agents();
				$data['agent_list'] = $result;
				$result2 = $this->users_model->get_agent($agent_id);
				$data['agent'] = $result2;
				
				$this->load->view('admin/common/header_2');
				$this->load->view('admin/view-agent',$data);
				$this->load->view('admin/common/footer_2');
			}
		}
		
		//Agent Add
		function add_agent(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$result = $this->users_model->list_agents();
				$data['agent_list'] = $result;
				
				$this->load->view('admin/common/header_2');
				$this->load->view('admin/add-agent',$data);
				$this->load->view('admin/common/footer_2');
			}
		}
		
		function insert_agent(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$pass = rand(0,999);
				$data_agent = array(
					'name'		=>	$this->input->post('name'),
					'email'		=>	$this->input->post('email'),
					'cell'		=>	$this->input->post('cell'),
					'pass'		=>	MD5($pass),
					'status'	=>	'agent',
					'last_date'	=>	date('Y-m-d'),
					'sms'		=>	$this->input->post('sms')
				);
				
				//Dropzone Pic
				if(!empty($_FILES)){
					$tempFile1 = $_FILES['file']['tmp_name'];
					
					//Include ImgCompressor.php
					include_once('ImgCompressor.php');

					//Setting
					$setting = array(
						'directory' => getcwd().'/assets/admin/images/users', // directory file compressed output
						'file_type' => array( // file format allowed
							'image/jpeg',
							'image/png',
							'image/gif'
						)
					);

					//Create Object
					$ImgCompressor = new ImgCompressor($setting);

					//Run('STRING original file path', 'output file type', INTEGER Compression level: from 0 (no compression) to 9);
					$result1 = $ImgCompressor->run($tempFile1, 'jpg', 9); // example level = 2 same quality 80%, level = 7 same quality 30% etc

					$CompressedFile1 = $result1['data']['compressed']['name'];
					$targetFile1 = $result1['data']['compressed']['image'];
					move_uploaded_file($CompressedFile1,$targetFile1);
					
					//$fileName = substr(sha1(rand(000,9999)),0,7).$_FILES['file']['name'];
					//$targetPath = getcwd().'/assets/admin/images/users/';
					//$targetFile = $targetPath.$fileName;
					//move_uploaded_file($tempFile,$targetFile);
					
					$data_agent['pic'] = $CompressedFile1;
					$result2 = $this->users_model->add_agent($data_agent);
					if($result2){
						$this->session->set_flashdata('success','Agent Added Successfully');
					}else{
						$this->session->set_flashdata('error','Agent Already Exists !');
					}
				}else{
					$result3 = $this->users_model->add_agent($data_agent);
					if($result3){
						$this->session->set_flashdata('success','Agent Added Successfully');
					}else{
						$this->session->set_flashdata('error','Agent Already Exists !');
					}
				}
				redirect('admin/agents');
			}
		}
		
		//Agent Update
		function update_agent(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$agent_id = $this->uri->segment(3);
				$data_new_agent = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'cell' => $this->input->post('cell'),
					'sms' => $this->input->post('sms')
				);
				//Dropzone Pic
				if(!empty($_FILES)){
					$tempFile1 = $_FILES['file']['tmp_name'];
					
					//Include ImgCompressor.php
					include_once('ImgCompressor.php');

					//Setting
					$setting = array(
						'directory' => getcwd().'/assets/admin/images/users', // directory file compressed output
						'file_type' => array( // file format allowed
							'image/jpeg',
							'image/png',
							'image/gif'
						)
					);

					//Create Object
					$ImgCompressor = new ImgCompressor($setting);

					//Run('STRING original file path', 'output file type', INTEGER Compression level: from 0 (no compression) to 9);
					$result1 = $ImgCompressor->run($tempFile1, 'jpg', 7); // example level = 2 same quality 80%, level = 7 same quality 30% etc

					$CompressedFile1 = $result1['data']['compressed']['name'];
					$targetFile1 = $result1['data']['compressed']['image'];
					move_uploaded_file($CompressedFile1,$targetFile1);
					
					//$fileName = substr(sha1(rand(000,9999)),0,7).$_FILES['file']['name'];
					//$targetPath = getcwd().'/assets/admin/images/users/';
					//$targetFile = $targetPath.$fileName ;
					//move_uploaded_file($tempFile,$targetFile);
					
					//Unlink Pic
					$result2 = $this->users_model->get_agent($agent_id);
					$pic = $result2[0]['pic'];
					$path = getcwd().'/assets/admin/images/users/'.$pic;
					unlink($path);
					
					$pic = array('pic' => $CompressedFile1);
					$result3 = $this->users_model->edit_agent_pic($agent_id,$pic);
					$result4 = $this->users_model->edit_agent($data_new_agent,$agent_id);
					redirect('admin/edit_agent/'.$agent_id.'');
				}else{
					$resul5 = $this->users_model->edit_agent($data_new_agent,$agent_id);
					redirect('admin/edit_agent/'.$agent_id.'');				
				}
			}
		}
		
		//Agent Delete
		function delete_agent(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$agent_id = $this->uri->segment(3);
				//Pic
				$result1 = $this->users_model->get_agent($agent_id);
				$pic = $result1[0]['pic'];
				$path = getcwd().'/assets/admin/images/users/'.$pic;
				unlink($path);
				
				//Record
				$result2 = $this->users_model->delete_agent($agent_id);
				redirect('admin/agents');
			}
		}
	}
?>