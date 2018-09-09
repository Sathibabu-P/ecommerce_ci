<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
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
		$this->load->view('header');
		$this->load->view('view');
		$this->load->view('footer');
	}

	public function cart()
	{
		$this->load->view('header');
		$this->load->view('cart');
		$this->load->view('footer');
	}

	public function checkout()
	{
		$this->load->view('header');
		$this->load->view('checkout');
		$this->load->view('footer');
	}
}
