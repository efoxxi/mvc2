<?php

class Members extends CI_Controller {

    private $Item = "Member";
    private $items;
    private $modelitems;
    
    function __construct() {
        parent::__construct();
        $this->items = strtolower($Item)."s";
        $this->modelitems = "model".$this->items;
        $this->load->model($curr);
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        $data['title'] = $this->Item . "s application";
        $data['heading'] = $this->Item . "s list";
        $data['res'] = $this->{$this->curr}->get_all();
        $this->load->view('view' . $this->items, $data);
    }

    function delete() {
        $this->{$this->curr}->delete();
        redirect($this->items . '/index');
    }

    function add() {
        $data['title'] = "Add " . $this->Item;
        $data['heading'] = "Add " . $this->Item;
        $this->load->view('add' . $this->items, $data);
    }

    function insert() {
        $data = $_POST;
        $this->{$this->curr}->insert($data);
        redirect($this->items . '/index');
    }

    function edit() {
        $data['title'] = "Edit " . $this->Item;
        $data['heading'] = "Edit " . $this->Item;

        $this->db->where('id', $this->uri->segment(3));
        $data['query'] = $this->db->get($this->items);
        $this->load->view('edit' . $this->items, $data);
    }

    function update() {
        $data = $_POST;
        $this->{$this->curr}->update($data);
        redirect($this->items . '/index');
    }

    function restoredb() {
        $this->{$this->curr}->restoredb();
        redirect($this->items . '/index');
    }

}

?>
