<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	

	function __construct() {
        parent::__construct();       
        $this->load->model('DB'); 
        $this->load->model('Order');
       
    }
    private $tableName = 'orders';

    public function index()
    {	

    	$data['title'] = 'Orders';
		// $data['orders'] = $this->Order->getOrders();		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/orders/index',$data);
		$this->load->view('admin/footer');
    }

    public function getOrderList()
	{

			$columns = array( 
                0 =>'created_at', 
                1 =>'ref_number',
                2=> 'customer_id',
                3=> 'order_total',
                4=> 'status'
            );

			$limit = $this->input->post('length');
	        $start = $this->input->post('start');
	        $order = $columns[$this->input->post('order')[0]['column']];
	        $dir = $this->input->post('order')[0]['dir'];
	  
	        $totalData = $this->Order->allorders_count();
	            
	        $totalFiltered = $totalData; 
	            
	        if(empty($this->input->post('search')['value']))
	        {            
	            $orders = $this->Order->allorders($limit,$start,$order,$dir);
	        }
	        else {
	            $search = $this->input->post('search')['value']; 

	            $orders =  $this->Order->orders_search($limit,$start,$search,$order,$dir);

	            $totalFiltered = $this->Order->orders_search_count($search);
	        }

	        $data = array();
	        if(!empty($orders))
	        {	
	        	$i = 1;
	            foreach ($orders as $order)
	            {
	            	$nestedData['sno'] = $i++;
	                $nestedData['refno'] = $order->ref_number;
	                $nestedData['custname'] = $order->fname;
	                $nestedData['ordamt'] = $order->order_total; 
	                $nestedData['status'] = $order->status;              
	                $data[] = $nestedData;

	            }
	        }
	          
	        $json_data = array(
            "draw"            => intval($this->input->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
	            
	        echo json_encode($json_data); 
	}

    // get Orders List
    // public function getOrderList() {    
    //     $orderID = $this->input->post('order_id');
    //     $name = $this->input->post('name');
    //     $startDate = $this->input->post('start_date');
    //     $endDate = $this->input->post('end_date');        

    //     // print_r($_POST);
    //     // die();
    //     if(!empty($orderID)){
    //         $this->Order->setOrderID($orderID);
    //     }        
    //     if(!empty($name)){
    //         $this->Order->setName($name);
    //     }                
    //     if(!empty($startDate) && !empty($endDate)) {
    //         $this->Order->setStartDate(date('Y-m-d', strtotime($startDate)));
    //         $this->Order->setEndDate(date('Y-m-d', strtotime($endDate)));
    //     }        
    //     $getOrderInfo = $this->Order->getOrders();
    //     $dataArray = array();
    //     $i = 1;
        
    //     foreach ($getOrderInfo as $element) { 
    //     $action = '<a href="javascript:void(0);" data-href="'.base_url().'index.php/admin/orders/view/'.$element['id'].'" class="btn btn-sm blue openBtn" title="order list items"><i class="fa fa-list"></i>View</a> <a href="'.base_url().'index.php/admin/orders/delete/'.$element['id'].'" class="btn btn-sm red" onclick="return confirm("Are your sure delete?");"><i class="fa fa-trash"></i>Delete</a>';           
    //         $dataArray[] = array( 
    //         	$i++,              
    //             $element['created_at'],
    //             $element['ref_number'],
    //             $element['fname'],
    //             $element['order_total'],               
    //             $element['status'],
    //             $action,
    //         );
    //     }
    //     echo json_encode(array("data" => $dataArray));
    // }

    public function view()
    {
    	$id =$this->uri->segment(4);
    	$order = $this->DB->find_by_id($this->tableName,$id);
    	$order_items = $this->DB->orderItems($id);
    	$data = '';
    	$i = 0;
    	foreach($order_items as $item) {
    		$data .= '<tr>';
    		$data .= '<td>'.++$i.'</td>';
			$data .= '<td>'.$item['name'].'</td>';
			$data .= '<td>'.$item['item_price'].'</td>';
			$data .= '<td>'.$item['quantity'].'</td>';
			$data .= '<td>'.$item['total_price'].'</td>';
			$data .= '</tr>';
		}
		$data .= '<tr><td colspan="4">Order Total</td><td>'.$order['order_total'].'</td></tr>';
		echo $data;
    }
 }
