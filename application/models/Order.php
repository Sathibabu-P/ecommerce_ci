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
        $query = $this
                ->db
                ->like('id',$search)
                ->or_like('title',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('orders');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function orders_search_count($search)
    {
        $query = $this
                ->db
                ->like('id',$search)
                ->or_like('title',$search)
                ->get('orders');
    
        return $query->num_rows();
    } 
   
}
