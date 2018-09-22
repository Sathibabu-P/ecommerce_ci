<?php
class DB extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    
    public function all($tableName,$limit=null){
    	$this->db->order_by('created_at','desc');
        if($limit!=''){
           $this->db->limit($limit);
        }
    	$query = $this->db->get($tableName);
        if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }   

    public function find_by_id($tableName,$id){       
    	$this->db->where('id =',$id);
    	$query = $this->db->get($tableName);
        if ($query->num_rows() == 1) return $query->row_array();
        return NULL;
    }

    public function find_by($tableName,$column,$id){       
        $this->db->where($column.'=',$id);
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) return $query->row_array();
        return NULL;
    }
    
    public function create($tableName,$data){
        $data['created_at'] =  date("Y-m-d H:i:s");
        $data['updated_at'] =  date("Y-m-d H:i:s");      
    	if ($this->db->insert($tableName, $data)) {        	
        	// $query = $this->db->get_where($tableName,array('id' => $this->db->insert_id()));
            // return $query->row_array();
            return $this->db->insert_id();
        }
        return false;
    }

   function update($tableName,$id, $data){
        $data['updated_at'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $id);
        $this->db->update($tableName, $data);
         if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;      
    }

    public function delete($tableName,$id){    
    	$this->db->where('id', $id);
        $this->db->delete($tableName);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function insert($tableName,$data){
        $insert = $this->db->insert_batch($tableName,$data);
        return $insert?true:false;
    }

    public function item_images($item_id){
        $this->db->where('item_id', $item_id);
        $this->db->order_by('created_at','desc');
        $query = $this->db->get('item_images');
        if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }

     public function bannerimage($image,$item){

        $this->db->set('banner_image', flase); 
        $this->db->where('item_id', $item);
        $this->db->update('item_images');
        
        $this->db->set('banner_image', true); 
        $this->db->where('id', $image);
        $this->db->update('item_images');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }  

    public function getOrder($id)
    {   
        $this->db->where('id =',$id);
        $query = $this->db->get('orders');
        if ($query->num_rows() == 1) {
            $order = $query->row_array();
            $order['customer'] = $this->find_by_id('customers',$order['customer_id']);
            $order['items'] = $this->orderItems($order['id']);
            return $order;
        }
        return NULL;

        // $this->db->select('orders.*,customers.*,order_items.*,items.*');
        // $this->db->from('orders');
        // $this->db->join('customers', 'customers.id = orders.customer_id');
        // $this->db->join('order_items', 'order_items.order_id  = orders.id');
        // $this->db->join('items', 'order_items.items_id  = items.id');
        // $this->db->where('order.id', $id);
        // $query = $this->db->get();       
        //  if ($query->num_rows() > 0) return $query->result_array();
        // return NULL;
    }

    public function orderItems($id)
    {
       $this->db->select('order_items.*,items.*');
       $this->db->from('order_items');
       $this->db->join('items', 'order_items.item_id   = items.id');
       $this->db->where('order_items.order_id', $id);
       $query = $this->db->get();       
       if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }
    

    
    public function isunique($tableName,$name){
    	$this->db->where('name =',$name);  
        $id =$this->input->post('id');     
        if($id) $this->db->where('id !=',$id);        	
    	$query = $this->db->get($tableName);
        if ($query->num_rows() > 0) return true;
        return false;
    }
}