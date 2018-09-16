<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct() {
        parent::__construct();       
        $this->load->model('DB');   
 		$this->load->library('cart');
    }


    public function add()
	{
		// Set array for send data.
		$id = $this->input->post('id');
		$item = $this->DB->find_by_id('items',$id);
		$data = array(
			'id' => $item['id'],
			'name' => $item['name'],
			'price' => $item['actual_price'],
			'qty' => 1
		);	
		$this->cart->insert($data);
		$count = count($this->cart->contents());
		echo $count;
		
	}

	public function update()
	{
		
		$quantity = array();
		 foreach ($this->input->post('quantity') as $value){
		 	array_push($quantity,$value);
    	}
    	$i = 0;
    	foreach ($this->input->post('id') as $value){
			 $this->cart->update(array(
            	'rowid'      =>     $value,
	            'qty'        =>     $quantity[$i],
	        ));
			 $i++;
    	}
    	redirect('index.php/cart');
	}

	public function remove()
	{
		// Set array for send data.

	  $row_id = $id =$this->uri->segment(3);
	  $data = array(
	   'rowid'  => $row_id,
	   'qty'  => 0
	  );
	  $this->cart->update($data);
	  redirect('index.php/cart');
	}


}