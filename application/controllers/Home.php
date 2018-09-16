<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();       
        $this->load->model('DB');   
 		$this->load->library('cart');
    }

	public function index()
	{	
		$data['title'] = 'Items';
		$data['items'] = $this->DB->all('items',4);
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}

	public function shop()
	{
		$this->load->view('header');
		$this->load->view('shop');
		$this->load->view('footer');
	}

	public function view()
	{	
		$id =$this->uri->segment(2);
		$data['item'] = $this->DB->find_by_id('items',$id);
		$data['item_images'] = $this->DB->item_images($id);
		$this->load->view('header');
		$this->load->view('view',$data);
		$this->load->view('footer');
	}

	public function cart()
	{	
		$data['cart'] = $this->cart->contents();
		$this->load->view('header');
		$this->load->view('cart',$data);
		$this->load->view('footer');
	}

	public function checkout()
	{
		$this->load->view('header');
		$this->load->view('checkout');
		$this->load->view('footer');
	}

	
}
