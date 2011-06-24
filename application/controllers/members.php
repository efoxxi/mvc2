<?php
class Members extends CI_Controller {

    private $Item;
    private $items;
    private $modelitems;

    function __construct() {
        parent::__construct();
        $this->items = strtolower($this->uri->segment(1)); // items
        $this->Item = strtoupper(substr($this->items, 0, 1)) .
                substr($this->items, 1, strlen($this->items) - 2); // Item
        $this->modelitems = "model" . $this->items; // modelitems
        $this->load->model($this->modelitems);
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index() {
        $data['title'] = $this->Item . "s application";
        $data['heading'] = $this->Item . "s list";
        $data['res'] = $this->{$this->modelitems}->get_all();
        $this->load->view('view' . $this->items, $data);
    }

    function delete() {
        $this->{$this->modelitems}->delete();
        redirect($this->items . '/index');
    }

    function add() {
        $data['title'] = "Add " . $this->Item;
        $data['heading'] = "Add " . $this->Item;
        $this->load->view('add' . $this->items, $data);
    }

    function insert() {
        $data = $_POST;
        $this->{$this->modelitems}->insert($data);
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
        $this->{$this->modelitems}->update($data);
        redirect($this->items . '/index');
    }

    function restoredb() {
        $this->{$this->modelitems}->restoredb();
        redirect($this->items . '/index');
    }

}

?>
