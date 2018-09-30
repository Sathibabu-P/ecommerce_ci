<?php

class Order extends CI_Model 
{
    function __construct() {
        parent::__construct(); 
        
    }

    function allorders_count()
    {   
        
       

        $query = $this
                ->db
                ->get('orders');
    
        return $query->num_rows();  

    }
    
    function allorders($limit,$start,$col,$dir)
    {   
       

    	 $this->db->select('orders.*,customers.firstname as fname,customers.lastname as lname');
        $this->db->from('orders');
        $this->db->join('customers', 'customers.id = orders.customer_id');
        // $this->db->join('order_items', 'order_items.order_id  = orders.id');
        // $this->db->join('items', 'order_items.items_id  = items.id');
        // $this->db->where('order.id', $id);
         $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();     
        if ($query->num_rows() > 0) return $query->result();
        return NULL;

      
        
    }
   
    function orders_search($limit,$start,$search,$col,$dir)
    {	
    	 $this->db->select('orders.*,customers.firstname as fname,customers.lastname as lname');
        $this->db->from('orders');
        $this->db->join('customers', 'customers.id = orders.customer_id');
        $query = $this
                ->db
                ->like('ref_number',$search)
                ->or_like('customers.firstname',$search)
                ->or_like('order_total',$search)
                ->or_like('status',$search)
                ->or_like('orders.created_at',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        
       
        if($query->num_rows()>0) return $query->result();  
        return null;
    }

    function orders_search_count($search)
    {
         $this->db->select('orders.*,customers.firstname as fname,customers.lastname as lname');
        $this->db->from('orders');
        $this->db->join('customers', 'customers.id = orders.customer_id');
        $query = $this
                ->db
                ->like('ref_number',$search)
                ->or_like('customers.firstname',$search)
                ->or_like('order_total',$search)
                ->or_like('status',$search)   
                ->or_like('orders.created_at',$search)                          
                ->get();
    
        return $query->num_rows();
    } 
   
}
