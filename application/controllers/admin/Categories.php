<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	

	function __construct() {
        parent::__construct();       
        $this->load->model('DB'); 
       
    }
     private $tableName = 'categories';

	public function index()
	{	
		$data['title'] = 'Categories';
		$data['categories'] = $this->DB->all($this->tableName);		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/categories/index',$data);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		$submit = $this->input->post('submit');
		if ($this->form_validation->run('category') == FALSE)
        {       

            $data['title'] = 'Create category';	
        	$this->load->view('admin/header');
        	$this->load->view('admin/sidebar');
			$this->load->view('admin/categories/create',$data);
			$this->load->view('admin/footer');
        }else{
        	$data = $this->category_data();
        	if($id = $this->DB->create($this->tableName,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Something went wrong..');
        	}
        	
        	if($submit == 'index')
        	redirect('index.php/admin/categories');
        	if($submit == 'edit')
        	redirect('index.php/admin/categories/edit/'.$id);
        }
	}

	public function edit()
	{	
		$submit = $this->input->post('submit');
		$id =$this->uri->segment(4);
		if(empty($id)) $id =$this->input->post('id');
		if ($this->form_validation->run('category') == FALSE)
        {
			$data['title'] = 'Edit category';
			$data['category'] = $this->DB->find_by_id($this->tableName,$id);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/categories/edit',$data);
			$this->load->view('admin/footer');
		}else{
					
			$data = $this->category_data();		
        	if($this->DB->update($this->tableName,$id,$data)){
        		$this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('message', 'Sucessfully Creted..');                
        	}else{
        		$this->session->set_flashdata('type', 'danger');
                $this->session->set_flashdata('message', 'Something went wrong..');
        	}
        	if($submit == 'index')
        	redirect('index.php/admin/categories');
        	if($submit == 'edit')
        	redirect('index.php/admin/categories/edit/'.$id);
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
    	redirect('index.php/admin/categories');
	}

	private function category_data(){
		$data['name'] = $this->input->post('name');    	
    	$data['status'] = $this->input->post('status');
    	return $data;
	}

	public  function isunique($name){
		if($this->DB->isunique($this->tableName,$name)){
			$this->form_validation->set_message('isunique', 'Category Name alredy used..');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}

	