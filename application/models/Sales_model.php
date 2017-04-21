<?php
class Sales_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   /**************************  START INSERT QUERY ***************/
    public function insert_data($data){
        $this->db->insert('sales_log', $data); 
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/

    
    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT s.sname, s.stel, s.date, s.c_id, s.f_id, c.id, f.id  FROM sales_log s JOIN customer c on c.id = s.c_id JOIN fruits f on f.id = s.f_id 
                                          ORDER BY s.id ASC");
		return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/

    
    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT s.sname, s.stel, s.date, s.c_id, c.f_id, c.id, f.id  FROM sales_log s JOIN customer c on c.id = s.c_id JOIN fruits f on f.id = s.f_id 
					  WHERE s.id = $id");
		return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/
    
    
   /****************************  Retrieve data from other tables ***************************/

    public function retrieve_data(){
        $query=$this->db->query("SELECT * FROM customer");
		return $query->result_array();
    }
    

}