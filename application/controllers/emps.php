<?php

//being adapted for CI2, TG 7/4/11
class Emps extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('empsmodel');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        //default method, gets data from model
        //and lists using default view
        $data['title'] = "Employee application";
        $data['heading'] = "Employee list";
        $data['res'] = $this->empsmodel->get_all_emps();
        $this->load->view('empsview', $data);
    }

    function deleteemp() {
        //called by empslistview url, with segment 3 = id
        //which is still used by empsmodel->delete_entry
        //id is not posted, just part of url in the link code
        $this->empsmodel->deleteemp();
        //using the url helper
        redirect('emps/index');
    }

    function addemp() {
        //form for adding an entry';
        $data['title'] = "Add Employee";
        $data['heading'] = "Add Employee";
        $this->load->view('empsaddview', $data);
    }

    function insertemp() {
        //calls the model function for actually inserting the new record
        //get the data array from the post array sent by empsaddview.php
        $data = $_POST;
        //print_r($data);
        //if using helper
        //$data=$this->input->post();
        //send the data to the insertemp function in the model
        $this->empsmodel->insertemp($data);
        //after insert, redirect back to main page
        //header('Location: http://localhost/mvc/index.php/emps/index');
        //using url helper is easier, ie
        redirect('emps/index');
    }
    
    function restoreempdb() {
        $this->empsmodel->restoreempdb();
        redirect('emps/index');
    }

}

?>
