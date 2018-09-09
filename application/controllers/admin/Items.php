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
		if ($this->form_validation->run('item') == FALSE)
        {
			$data['title'] = 'Edit item';
			$id =$this->uri->segment(4);
			if(empty($id)) $id =$this->input->post('id');
			$data['item'] = $this->DB->find_by_id($this->tableName,$id);			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/items/edit',$data);
			$this->load->view('admin/footer');
		}else{
			$id =$this->input->post('id');			
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


	public  function isunique($name){
		if($this->DB->isunique($this->tableName,$name)){
			$this->form_validation->set_message('isunique', 'Item Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	private function item_data(){
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
