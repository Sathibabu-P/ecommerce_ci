<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
	

	function __construct() {
        parent::__construct();       
        $this->load->model('DB'); 
       
    }
     private $tableName = 'items';

	public function index()
	{	
		$data['title'] = 'Items';
		$data['items'] = $this->DB->all($this->tableName);		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/items/index',$data);
		$this->load->view('admin/footer');
	}

	

	public function create()
	{			
		$submit = $this->input->post('submit');
		if ($this->form_validation->run('item') == FALSE)
        {       

            $data['title'] = 'Create item';
            $data['categories'] = $this->DB->all('categories');		
        	$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/items/create',$data);
			$this->load->view('admin/footer');
        }else{
        	$data = $this->item_data();
        	if($id = $this->DB->create($this->tableName,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Something went wrong..');
        	}
        	
        	if($submit == 'index')
        	redirect('index.php/admin/items');
        	if($submit == 'edit')
        	redirect('index.php/admin/items/edit/'.$id);
        }
		
	}

	public function edit()
	{	
		$submit = $this->input->post('submit');
		$id =$this->uri->segment(4);
		if(empty($id)) $id =$this->input->post('id');
		if ($this->form_validation->run('item') == FALSE)
        {
			$data['title'] = 'Edit item';
			$data['categories'] = $this->DB->all('categories');
			$data['item'] = $this->DB->find_by_id($this->tableName,$id);
			$data['item_images'] = $this->DB->item_images($id);
			$data['tab'] = 'general';			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/items/edit',$data);
			$this->load->view('admin/footer');
		}else{
					
			$data = $this->item_data();		
        	if($this->DB->update($this->tableName,$id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Something went wrong..');
        	}
        	if($submit == 'index')
        	redirect('index.php/admin/items');
        	if($submit == 'edit')
        	redirect('index.php/admin/items/edit/'.$id);
		}
	}


	public function images()
	{	
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');		
        	$data = array();
        	// print_r(count($_FILES['itemImages']['name']));
        	// die();
	        // If file upload form submitted
	        if(count($_FILES['itemImages']['name']) > 0){
			$dir_path = base_url().'uploads/images/';
			// print_r($dir_path);
			// chmod($dir_path, 0755);
			$config['upload_path'] = $dir_path;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '0';
			$config['max_filename'] = '255';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload');
			//upload file
	        $is_file_error = FALSE;
	        for($i=0; $i<count($_FILES['itemImages']['name']); $i++)
	        {           

	        	
	            $_FILES['itemImage']['name']= $_FILES['itemImages']['name'][$i];
	            $_FILES['itemImage']['type']= $_FILES['itemImages']['type'][$i];
	            $_FILES['itemImage']['tmp_name']= $_FILES['itemImages']['tmp_name'][$i];
	            $_FILES['itemImage']['error']= $_FILES['itemImages']['error'][$i];
	            $_FILES['itemImage']['size']= $_FILES['itemImages']['size'][$i];    
	            $this->upload->initialize($config);
	            
	            if ($this->upload->do_upload('itemImage')){
                 //    $files = $this->upload->data();
                 //    $Filedata[$i]['item_id'] = $id;
                	// $Filedata[$i]['image_url'] = $files['file_name']; 
	            }else{
	            	$Filedata[$i]['item_id'] = $id;
                	$Filedata[$i]['image_url'] = 'tetsing'; 
                	$data['created_at'] =  date("Y-m-d H:i:s");
	            }
	        }
	       	
	       	if(!empty($Filedata)){
	        	$resp = $this->DB->insert('item_images',$Filedata);
	        }

	        // if($error == 1) return FALSE;
	        // return TRUE;
	    }
        	// die();
       		redirect('index.php/admin/items/edit/'.$id);
    	
    }
	


	public function delete(){
		$id =$this->uri->segment(4);		
		if($this->DB->delete($this->tableName,$id)){
			$this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Sucessfully Deleted..');                
    	}else{
    		$this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('message', 'Something went wrong..');
    	}
    	redirect('index.php/admin/items');
	}

	public function delimage(){
		$id =$this->uri->segment(4);		
		$this->DB->delete('item_images',$id);
	}

	public function baseimage(){
		$image = $this->input->post('image');
    	$item = $this->input->post('item');
		$this->DB->bannerimage($image,$item);
	}


	public  function isunique($name){
		if($this->DB->isunique($this->tableName,$name)){
			$this->form_validation->set_message('isunique', 'Item Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	private function item_data(){
		$data['category_id'] = $this->input->post('category_id');
		$data['name'] = $this->input->post('name');
    	$data['description'] = $this->input->post('description');
    	$data['actual_price'] = $this->input->post('actual_price');
    	$data['offer_price'] = $this->input->post('offer_price');
    	$data['weight'] = $this->input->post('weight');
    	$data['featured'] = 0;
    	$data['status'] = $this->input->post('status');
    	$data['quantity'] = $this->input->post('quantity');    
    	// $data['amenities'] = json_encode(implode(",", $this->input->post('amenities[]'))); 	
    	return $data;
	}



	
}
