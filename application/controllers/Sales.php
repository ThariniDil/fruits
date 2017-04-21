<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
		$this->load->model('Sales_model','sales'); /* LOADING MODEL * Welcome_model as welcome */
	}


	/**************************  START FETCH OR VIEW FORM DATA ***************/
	public function index()
	{
	    $this->data['view_data']= $this->sales->view_data();
	    $this->load->view('sales_view', $this->data, FALSE);
	}
	/****************************  END FETCH OR VIEW FORM DATA ***************/


	/****************************  START OPEN ADD FORM FILE ******************/
	public function add_data()
	{
		$this->load->view('sales_add');
	}
	/****************************  END OPEN ADD FORM FILE ********************/

    
    /****************************  START INSERT FORM DATA ********************/
    public function submit_data()
    {
    $data = array('sname'                       => $this->input->post('sname'),
	          'stel'                      => $this->input->post('stel'),
                  'date'                      => $this->input->post('date'),
                  'c_id'                      => $this->input->post('cid'),
                  'f_id'                      => $this->input->post('fid'));
    
    $insert = $this->sales->insert_data($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('sales/index');
    }
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
    $this->data['view_data']= $this->sales->view_data();
    $this->load->view('fruit_view', $this->data, FALSE);
    }
    /****************************  END FETCH OR VIEW FORM DATA ***************/

    
    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
    $this->data['edit_data']= $this->saless->edit_data($id);
    $this->load->view('sales_edit', $this->data, FALSE);
    }
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_data($id)
    {
    $data = array('sname'                     => $this->input->post('sname'),
	          'stel'                      => $this->input->post('stel'),
                  'date'                      => $this->input->post('date'),
                  'c_id'                      => $this->input->post('cid'),
                  'f_id'                      => $this->input->post('fid'));
    $this->db->where('id', $id);
    $this->db->update('sales_log', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('sales/index');
    }
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('sales_log');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('sales/index');
    }
    /****************************  END DELETE DATA ***************************/
    
    
    /****************************  Retrieve data from other tables ***************************/
    
    public function retrieve_data() {
        
        $this->data['retrieve_data'] = $this->sales->retrieve_data();
        $this->load->view('sales_add', $this->data, FALSE);        
        
    }
    

}
