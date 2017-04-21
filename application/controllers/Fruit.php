<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fruit extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');                    /*         * *** LOADING HELPER TO AVOID PHP ERROR *** */
        $this->load->model('Fruit_model', 'fruit'); /* LOADING MODEL * Welcome_model as welcome */
    }

    /*     * ************************  START FETCH OR VIEW FORM DATA ************** */

    public function index() {
        $this->data['view_data'] = $this->fruit->view_data();
        $this->load->view('fruit_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN ADD FORM FILE ***************** */

    public function add_data() {
        $this->load->view('add');
    }

    /*     * **************************  END OPEN ADD FORM FILE ******************* */


    /*     * **************************  START INSERT FORM DATA ******************* */

    public function submit_data() {
        $data = array('fname'  => $this->input->post('fname'),
                      'fprice' => $this->input->post('fprice'));

        $insert = $this->fruit->insert_data($data);
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('fruit/index');
    }

    /*     * **************************  END INSERT FORM DATA *********************** */


    /*     * **************************  START FETCH OR VIEW FORM DATA ************** */

    public function view_data() {
        $this->data['view_data'] = $this->fruit->view_data();
        $this->load->view('fruit_view', $this->data, FALSE);
    }

    /*     * **************************  END FETCH OR VIEW FORM DATA ************** */


    /*     * **************************  START OPEN EDIT FORM WITH DATA ************ */

    public function edit_data($id) {
        $this->data['edit_data'] = $this->fruit->edit_data($id);
        $this->load->view('edit', $this->data, FALSE);
    }

    /*     * **************************  END OPEN EDIT FORM WITH DATA ************** */


    /*     * **************************  START UPDATE DATA ************************ */

    public function update_data($id) {
        $data = array('fname'  => $this->input->post('fname'),
                      'fprice' => $this->input->post('fprice'));
        
        $this->db->where('id', $id);
        $this->db->update('fruits', $data);
        $this->session->set_flashdata('message', 'Your data updated Successfully..');
        redirect('fruit/index');
    }

    /*     * **************************  END UPDATE DATA *************************** */


    /*     * **************************  START DELETE DATA ************************* */

    public function delete_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('fruits');
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('fruit/index');
    }

    /*     * **************************  END DELETE DATA ************************** */
}
