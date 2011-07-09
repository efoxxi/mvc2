<?php

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
        $data['title'] = "Reports";
        $data['heading'] = "Reports";
        $data['report'][1] = "All project team members, sorted by project name and family name (project name, last name, given name)";
        $data['report'][2] = "All project issues for a selected member (project name, issue short description, type, priority, status)";
        $data['report'][3] = "All issues for a selected project (issue short description, issue details, type, priority, status)";
        $data['report'][4] = "All issues, from all projects, with a selected status, eg all open issues (project name, issue id, issue short description, status)";
        $data['report'][5] = "List of members who are not currently allocated to any open issues";
        $data['report'][6] = "Number of issues which have been resolved in each project";
        $data['res'] = $this->{$this->modelitems}->get_all();
        //print_r($data);
        $this->load->view('view' . $this->items, $data);
    }

}

?>