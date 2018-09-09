<?php
class Item extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private $tableName = 'items';


    public function items(){
    	$this->db->order_by('created_at','desc');
    	$query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) return $query->result_array();
        return NULL;
    }

    //  public function items(){
    //     $this->db->select('items.*,cities.name as cityname');
    //     $this->db->from($this->tableName);
    //     $this->db->join('cities', 'cities.id = items.city_id');
    //     $query = $this->db->get();       
    //      if ($query->num_rows() > 0) return $query->result_array();
    //     return NULL;
    // }

    public function item($id){       
    	$this->db->where('id =',$id);
    	$query = $this->db->get($this->tableName);
        if ($query->num_rows() == 1) return $query->row_array();
        return NULL;
    }
    
    public function create($data){
        $data['created_at'] =  date("Y-m-d H:i:s");      
    	if ($this->db->insert($this->tableName, $data)) {        	
        	$query = $this->db->get_where($this->tableName,array('id' => $this->db->insert_id()));
            //return $query->row_array();
            return true;
        }
        return false;
    }

   function update($id, $data){
        $data['updated_at'] =  date("Y-m-d H:i:s");
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
         if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;      
    }

    public function delete($id){    
    	$this->db->where('id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function isunique($name){
    	$this->db->where('name =',$name);       
        if($id) $this->db->where('id !=',$id);        	
    	$query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) return true;
        return false;
    }
}