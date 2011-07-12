<?php

class Homepage extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('modelhomepage');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    
    function index() {
        $data['title'] = "Homepage";
        $data['heading'] = "Homepage";
        $this->load->view('viewhomepage', $data);
    }

}

?>