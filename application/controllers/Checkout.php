<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct() {
        parent::__construct();       
        $this->load->model('DB');   
 		$this->load->library('cart');
    }

    public function order()
    {
    	// print_r($_POST);
    	if ($this->form_validation->run('order') == FALSE)
        {
        	$data['cart'] = $this->cart->contents();
			$this->load->view('header');
			$this->load->view('checkout',$data);
			$this->load->view('footer');
        }else{
        	// print_r($_POST);
        	$customer = $this->customer_data();
        	if($customer_id = $this->DB->create('customers',$customer)){
        		$order['customer_id'] = $customer_id;
                $order['order_total'] = $this->cart->total();
        		if($order_id = $this->DB->create('orders',$order)){
        			$cart = $this->cart->contents();
        			foreach($cart as $item) {
        				$order_item['order_id'] = $order_id;
        				$order_item['item_id'] = $item['id'];
        				$order_item['item_price'] = $item['price'];
        				$order_item['quantity'] = $item['qty'];
        				$order_item['total_price'] = $item['subtotal'];
        				$this->DB->create('order_items',$order_item);
        			}
        			$this->cart->destroy();
        		}	
        	}
        	$data['order'] = $this->DB->getOrder($order_id);
			$this->load->view('header');
			$this->load->view('sucess',$data);
			$this->load->view('footer');
        }
    }


    public function success($value='')
    {   
        $data['order'] = $this->DB->getOrder(3);       
        $this->load->view('header');
        $this->load->view('success',$data);
        $this->load->view('footer');
    }

    private function customer_data(){
		$data['firstname'] = $this->input->post('firstname');
    	$data['lastname'] = $this->input->post('lastname');
    	$data['email'] = $this->input->post('email');
    	$data['phoneno'] = $this->input->post('phoneno');
    	$data['address'] = $this->input->post('address');
    	$data['company'] = $this->input->post('company');
    	$data['city'] = $this->input->post('city');
    	$data['state'] = $this->input->post('state');    
    	$data['zipcode'] = $this->input->post('zipcode');    
    	// $data['amenities'] = json_encode(implode(",", $this->input->post('amenities[]'))); 	
    	return $data;
	}

}