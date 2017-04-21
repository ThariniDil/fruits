<?php
class Fruit_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   /**************************  START INSERT QUERY ***************/
    public function insert_data($data){
        $this->db->insert('fruits', $data); 
        return TRUE;
    }
    /**************************  END INSERT QUERY ****************/

    
    /*************  START SELECT or VIEW ALL QUERY ***************/
    public function view_data(){
        $query=$this->db->query("SELECT * FROM fruits f 
                                          ORDER BY f.id ASC");
		return $query->result_array();
    }
    /***************  END SELECT or VIEW ALL QUERY ***************/

    
    /*************  START EDIT PARTICULER DATA QUERY *************/
    public function edit_data($id){
        $query=$this->db->query("SELECT * FROM fruits f 
					  WHERE f.id = $id");
		return $query->result_array();
    }
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}//dn hari