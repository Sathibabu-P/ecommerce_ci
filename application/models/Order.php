<?php
class Order extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	private $_order_id;
    private $_name;
    private $_city;
    private $_startDate;
    private $_endDate;
 
    public function setOrderID($order_id) {
        $this->_order_id = $order_id;
    }
    public function setName($name) {
        $this->_name = $name;
    }    
    public function setStartDate($startDate) {
        $this->_startDate = $startDate;
    }
    public function setEndDate($endDate) {
        $this->_endDate = $endDate;
    }
    // get Orders List
    public function getOrders() {

        // $this->db->select('orders.*,c.firstname as fname,c.lastname as lname');
        // $this->db->from('orders o');
        // $this->db->join('customers c', 'c.id = o.customer_id');

        $this->db->select('orders.*,customers.firstname as fname,customers.lastname as lname');
        $this->db->from('orders');
        $this->db->join('customers', 'customers.id = orders.customer_id');


        // $this->db->select(array('o.order_id', 'o.name', 'o.city', 'o.amount', 'o.order_date', 'o.status', 'o.amount'));
        // $this->db->from('orders o');
        // if(!empty($this->_startDate) && !empty($this->_endDate)) {
        //     $this->db->where('DATE_FORMAT(FROM_UNIXTIME(`orders`.`created_at`),"%Y-%m-%d") BETWEEN \'' . $this->_startDate . '\' AND \'' . $this->_endDate . '\'');
        // }        
        if(!empty($this->_order_id)){
            $this->db->where('orders.ref_number', $this->_order_id);
        }        
        if(!empty($this->_name)){            
            $this->db->like('customers.firstname', $this->_name, 'both');
        }       
        $this->db->order_by('orders.created_at', 'DESC');

        $query = $this->db->get();       
        if ($query->num_rows() > 0) return $query->result_array();
        return NULL;

        // $query = $this->db->get();
        // return $query->result_array();
    }
 
}
?>