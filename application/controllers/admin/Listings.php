<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Listings extends CI_CONTROLLER{
		
		function __construct(){
			parent::__construct();
			$this->load->model('admin/autolistings_model');
			$this->load->model('admin/listings_model');
			$this->load->model('admin/users_model');
			$this->load->model('admin/status_model');
			$this->load->model('admin/steps_model');
		}
		
		function index(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$result = $this->listings_model->list_listings();
				$data['listing_list'] = $result;
				
				//Views
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/listings',$data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		//Autocomplete Listings
		function get_listings(){
			if(isset($_GET['listing'])){
				$search = strtolower($_GET['listing']);
				$this->autolistings_model->get_listings($search);
			}
		}
		
		//Listing View/Edit
		function edit_listing(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				$result1 = $this->listings_model->list_listings();
				$data['listing_list'] = $result1;
				
				//Listing Info
				$result2 = $this->listings_model->get_listing($listing_id);
				$data['listing'] = $result2;
				
				//Listing Steps Info
				$step_id1 = $data['listing'][0]['step_id'];
				$result3 = $this->steps_model->get_listing_step($step_id1);
				$data['listing_step'] = $result3;
				
				$result4 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result4;
				$data['steps_counter1'] = count($result4);
				
				//Closing Steps Info
				$step_id2 = $data['listing'][0]['step_id'];
				$result5 = $this->steps_model->get_closing_step($step_id2);
				$data['closing_step'] = $result5;
				
				$result6 = $this->steps_model->closing_steps();
				$data['closing_steps'] = $result6;
				$data['steps_counter2'] = count($result6);
				
				//Listing Pic
				$result7 = $this->listings_model->get_listing_pic($listing_id);
				$data['listing_pic'] = $result7;
				
				//Agents List
				$result8 = $this->users_model->list_agents();
				$data['agent_list'] = $result8;
				
				//Agent Info
				$agent_id = $data['listing'][0]['agent_id'];
				$result9 = $this->users_model->get_agent($agent_id);
				$data['agent'] = $result9;
				
				//Seller Info
				$seller_id = $data['listing'][0]['seller_id'];
				$result10 = $this->users_model->get_seller($seller_id);
				$data['seller'] = $result10;
				
				//PDFs
				$result11 = $this->status_model->get_pdf($listing_id);
				$data['listing_pdf'] = $result11;
				$data['pdf_counter'] = count($result11);
				
				//Gallery
				$result12 = $this->status_model->get_listing_gallery($listing_id);
				$data['listing_gallery'] = $result12;
				$data['pic_counter'] = count($result12);
				//echo "<pre>";print_r($data);exit;
				
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/view-listing',$data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		//Listing Add
		function add_listing(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$result1 = $this->users_model->list_agents();
				$result2 = $this->listings_model->list_listings();
				$data['agent_list'] = $result1;
				$data['listing_list'] = $result2;
				$data['listing_code'] = strtoupper(substr(sha1(rand(000,9999)),0,7));
				
				//Listing Steps
				$result3 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result3;
				$data['steps_counter'] = count($result3);
				
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/add-listing',$data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		function insert_listing(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$pass = rand(0,999);
				$data_seller = array(
					'name'		=>	$this->input->post('name'),
					'email'		=>	$this->input->post('email'),
					'cell'		=>	$this->input->post('cell'),
					'sms'		=>	$this->input->post('sms'),
					'pass'		=>	MD5($pass),
					'status'	=>	'seller',
					'last_date'	=>	date('Y-m-d')
				);
				$result1 = $this->users_model->add_seller($data_seller);
				$seller_id = $result1['id'];
				
				$data_listing = array(
					'code'		=>	$this->input->post('code'),
					'address'	=>	$this->input->post('address'),
					'city'		=>	$this->input->post('city'),
					'state'		=>	$this->input->post('state'),
					'zipcode'	=>	$this->input->post('zipcode'),
					'process'	=>	$this->input->post('process'),
					'step_id'	=>	$this->input->post('step'),
					'price'		=>	$this->input->post('price'),
					'agent_id'	=>	$this->input->post('agent'),
					'seller_id'	=>	$seller_id
				);
				$result2 = $this->listings_model->add_listing($data_listing);
				
				if($result2){
					$this->session->set_flashdata('success','Listing Added Successfully');
				}else{
					$this->session->set_flashdata('error','Listing Already Exists !');
				}
				
				//Without Dropzone - Pic
				$listing_id = $result2['id'];
				if(!empty($_FILES['pic']['name'])){
					$tempFile1 = $_FILES['pic']['tmp_name'];
					$origFile1 = $_FILES['pic']['name'];
					
					$ext = pathinfo($origFile1, PATHINFO_EXTENSION);
					if($ext == 'png'){
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['pic']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$targetFile1 = $targetPath1.$fileName1;
						move_uploaded_file($tempFile1,$targetFile1);
						
						$data_listing_pic['listing_id'] = $listing_id;
						$data_listing_pic['pic'] = $fileName1;
						$result4 = $this->listings_model->add_listing_pic($data_listing_pic);
					}else{
						$image = imagecreatefromjpeg($tempFile1);
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['pic']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$CompressedFile1 = $targetPath1.$fileName1;
						ImageJPEG($image,$CompressedFile1,50);
						
						$data_listing_pic['listing_id'] = $listing_id;
						$data_listing_pic['pic'] = $fileName1;
						$result4 = $this->listings_model->add_listing_pic($data_listing_pic);						
					}
				}else{
					echo "empty pic";
				}
				
				redirect('admin/add_files/'.$listing_id.'');
			}
		}
		
		//Listing Update
		function update_listing(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				$data_new_seller = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'cell' => $this->input->post('cell'),
					'sms' => $this->input->post('sms')
				);
				$result1 = $this->users_model->add_seller($data_new_seller);
				
				//Checking Process Step Change
				$listing_step = $this->input->post('listing_step');
				$closing_step = $this->input->post('closing_step');
				if($listing_step == '' && $closing_step == ''){
					$data_new_listing = array(
						'address'	=>	$this->input->post('address'),
						'city'		=>	$this->input->post('city'),
						'state'		=>	$this->input->post('state'),
						'zipcode'	=>	$this->input->post('zipcode'),
						'process'	=>	$this->input->post('process'),
						'step_id'	=>	$this->input->post('step'),
						'price'		=>	$this->input->post('price'),
						'agent_id'	=>	$this->input->post('agent'),
						'seller_id'	=>	$result1['id']
					);
				}elseif($listing_step == '' && $closing_step != ''){
					$data_new_listing = array(
						'address'	=>	$this->input->post('address'),
						'city'		=>	$this->input->post('city'),
						'state'		=>	$this->input->post('state'),
						'zipcode'	=>	$this->input->post('zipcode'),
						'process'	=>	$this->input->post('process'),
						'step_id'	=>	$closing_step,
						'price'		=>	$this->input->post('price'),
						'agent_id'	=>	$this->input->post('agent'),
						'seller_id'	=>	$result1['id']
					);
				}else{
					$data_new_listing = array(
						'address'	=>	$this->input->post('address'),
						'city'		=>	$this->input->post('city'),
						'state'		=>	$this->input->post('state'),
						'zipcode'	=>	$this->input->post('zipcode'),
						'process'	=>	$this->input->post('process'),
						'step_id'	=>	$listing_step,
						'price'		=>	$this->input->post('price'),
						'agent_id'	=>	$this->input->post('agent'),
						'seller_id'	=>	$result1['id']
					);
				}
				
				//echo "<pre>";print_r($data_new_listing);exit;
				$result2 = $this->listings_model->edit_listing($listing_id,$data_new_listing);
				
				//Without Dropzone - Pic & PDF
				if(!empty($_FILES['pic']['name'])){
					//Pic
					$tempFile1 = $_FILES['pic']['tmp_name'];
					$origFile1 = $_FILES['pic']['name'];
					
					$ext = pathinfo($origFile1, PATHINFO_EXTENSION);
					if($ext == 'png'){
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['pic']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$targetFile1 = $targetPath1.$fileName1;
						move_uploaded_file($tempFile1,$targetFile1);
						
						$result3 = $this->listings_model->get_listing_pic($listing_id);
						$pic = $result3[0]['pic'];
						$path = getcwd().'/assets/admin/images/image-gallery/'.$pic;
						unlink($path);
						
						$data_listing_pic['pic'] = $fileName1;
						$result4 = $this->listings_model->edit_listing_pic($listing_id,$data_listing_pic);
					}else{
						$image = imagecreatefromjpeg($tempFile1);
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['pic']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$CompressedFile1 = $targetPath1.$fileName1;
						ImageJPEG($image,$CompressedFile1,50);
						
						$result3 = $this->listings_model->get_listing_pic($listing_id);
						$pic = $result3[0]['pic'];
						$path = getcwd().'/assets/admin/images/image-gallery/'.$pic;
						unlink($path);
						
						$data_listing_pic['pic'] = $fileName1;
						$result4 = $this->listings_model->edit_listing_pic($listing_id,$data_listing_pic);
					}
				}
				
				if(!empty($_FILES['pdf']['name'])){
					//PDF
					$tempFile2 = $_FILES['pdf']['tmp_name'];
					$fileName2 = substr(sha1(rand(000,9999)),0,7).$_FILES['pdf']['name'];
					$targetPath2 = getcwd().'/assets/admin/files/';
					$targetFile2 = $targetPath2.$fileName2;
					move_uploaded_file($tempFile2,$targetFile2);
					
					$data_listing_pdf['listing_id'] = $listing_id;
					$data_listing_pdf['pdf'] = $fileName2;
					$result5 = $this->listings_model->add_listing_pdf($data_listing_pdf);
				} 
				
				redirect('admin/edit_listing/'.$listing_id.'');				
			}
		}
		
		function add_listing_files(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				
				$result1 = $this->listings_model->list_listings();
				$data['listing_list'] = $result1;
				
				//Listing Info
				$result2 = $this->listings_model->get_listing($listing_id);
				$data['listing'] = $result2;
				
				//Listing Steps Info
				$step_id = $data['listing'][0]['step_id'];
				$result3 = $this->steps_model->get_listing_step($step_id);
				$data['listing_step'] = $result3;
				
				$result4 = $this->steps_model->listing_steps();
				$data['listing_steps'] = $result4;
				$data['steps_counter'] = count($result4);
				
				//Listing Pic
				$result5 = $this->listings_model->get_listing_pic($listing_id);
				$data['listing_pic'] = $result5;
				
				//Agents List
				$result6 = $this->users_model->list_agents();
				$data['agent_list'] = $result6;
				
				//Agent Info
				$agent_id = $data['listing'][0]['agent_id'];
				$result7 = $this->users_model->get_agent($agent_id);
				$data['agent'] = $result7;
				
				//Seller Info
				$seller_id = $data['listing'][0]['seller_id'];
				$result8 = $this->users_model->get_seller($seller_id);
				$data['seller'] = $result8;
				
				//Views
				$this->load->view('admin/common/header_3');
				$this->load->view('admin/add-pdf',$data);
				$this->load->view('admin/common/footer_3');
			}
		}
		
		//PDFs - For Loop Not Needed :)
		function listing_pdf(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				
				//Dropzone - PDF
				if(!empty($_FILES)){
					$tempFile = $_FILES['file']['tmp_name'];
					$fileName = substr(sha1(rand(000,9999)),0,7).$_FILES['file']['name'];
					$targetPath = getcwd().'/assets/admin/files/';
					$targetFile = $targetPath.$fileName;
					move_uploaded_file($tempFile,$targetFile);
					
					$data_listing_pdf['listing_id'] = $listing_id;
					$data_listing_pdf['pdf'] = $fileName;
					
					$this->load->database(); // load database
					$this->db->insert('listing_pdfs',array('listing_id' => $listing_id,'pdf' => $fileName));
					
				}
				redirect('admin/edit_listing/'.$listing_id.'');
			}
		}
		
		//Gallery - For Loop Not Needed :)
		function listing_gallery(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				
				//Dropzone - Gallery
				if(!empty($_FILES)){
					$tempFile1 = $_FILES['file']['tmp_name'];
					$origFile1 = $_FILES['file']['name'];
					
					$ext = pathinfo($origFile1, PATHINFO_EXTENSION);
					if($ext == 'png'){
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['file']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$targetFile1 = $targetPath1.$fileName1;
						move_uploaded_file($tempFile1,$targetFile1);
						
						$data_listing_gallery['listing_id'] = $listing_id;
						$data_listing_gallery['pic'] = $fileName1;
						
						$this->load->database(); // load database
						$this->db->insert('listing_gallery',array('listing_id' => $listing_id,'pic' => $fileName1));						
					}else{
						$image = imagecreatefromjpeg($tempFile1);
						$fileName1 = substr(sha1(rand(000,9999)),0,7).$_FILES['file']['name'];
						$targetPath1 = getcwd().'/assets/admin/images/image-gallery/';
						$CompressedFile1 = $targetPath1.$fileName1;
						ImageJPEG($image,$CompressedFile1,50);
						
						$data_listing_gallery['listing_id'] = $listing_id;
						$data_listing_gallery['pic'] = $fileName1;
						
						$this->load->database(); // load database
						$this->db->insert('listing_gallery',array('listing_id' => $listing_id,'pic' => $fileName1));
					}
				}
				redirect('admin/edit_listing/'.$listing_id.'');
			}
		}
		
		//Listing PDF Rename
		function rename_listing_pdf(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$pdf_id = $this->uri->segment(3);
				$listing_id = $this->uri->segment(4);
				$pdf_name = array(
					'pdf'	=>	$this->input->post('pdf')
				);
				
				//Get Pdf Name
				$result1 = $this->listings_model->get_listing_pdf($pdf_id);
	
				//Update Record
				$result2 = $this->listings_model->edit_listing_pdf($pdf_id,$pdf_name);

				//Get New Pdf Name
				$result3 = $this->listings_model->get_listing_pdf($pdf_id);
				
				//Rename PDF
				$old_pdf = $result1[0]['pdf'];
				$new_pdf = $result3[0]['pdf'];
				$old_name = getcwd().'/assets/admin/files/'.$old_pdf;
				$new_name = getcwd().'/assets/admin/files/'.$new_pdf;
				rename($old_name,$new_name);
				
				redirect('admin/edit_listing/'.$listing_id);
			}
		}
		
		//Listing PDF Delete
		function delete_listing_pdf(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$pdf_id = $this->uri->segment(3);
				$listing_id = $this->uri->segment(4);
				//Pdf
				$result1 = $this->listings_model->get_listing_pdf($pdf_id);
				$pdf = $result1[0]['pdf'];
				$path = getcwd().'/assets/admin/files/'.$pdf;
				unlink($path);
				//Record
				$result2 = $this->listings_model->delete_listing_pdf($pdf_id);
				redirect('admin/edit_listing/'.$listing_id);
			}
		}
		
		//Listing Gallery Delete
		function delete_listing_gallery(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$gallery_id = $this->uri->segment(3);
				$listing_id = $this->uri->segment(4);
				//Gallery
				$result1 = $this->listings_model->get_listing_gallery($gallery_id);
				$gallery = $result1[0]['pic'];
				$path = getcwd().'/assets/admin/images/image-gallery/'.$gallery;
				unlink($path);
				//Record
				$result2 = $this->listings_model->delete_listing_gallery($gallery_id);
				redirect('admin/edit_listing/'.$listing_id);
			}
		}
		
		//Listing Delete
		function delete_listing(){
			if($this->session->userdata('log_in') == ''){
				redirect('admin');
			}else{
				$listing_id = $this->uri->segment(3);
				//Pics
				$result1 = $this->listings_model->get_listing_pic($listing_id);
				$pic = $result1[0]['pic'];
				$path1 = getcwd().'/assets/admin/images/image-gallery/'.$pic;
				unlink($path1);
				//Gallery
				$result2 = $this->listings_model->listing_gallery_counter($listing_id);
				$counter = $result2;
				//print_r($counter);exit;
				$result3 = $this->listings_model->delete_listing_galleries($listing_id,$counter);
				//$gallery = $result2[0]['pic'];
				//$path2 = getcwd().'/assets/admin/images/image-gallery/'.$gallery;
				//unlink($path2);
				//Records
				$result4 = $this->listings_model->delete_listing($listing_id);
				redirect('admin/listings');
			}
		}
	}
?>