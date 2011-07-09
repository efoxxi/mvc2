<?php

include_once("IMP.php");

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->items = strtolower($this->uri->segment(1)); // items
        $this->modelitems = "model" . $this->items; // modelitems
        $this->load->model($this->modelitems);
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        $data['title'] = "Report";
        $data['heading'] = "Report";
        $data['report'] = "Members where Issues is not open";
        $data['res'] = $this->{$this->modelitems}->get_all();
        //print_r($data);
        $this->load->view('view' . $this->items, $data);
    }

}

?>