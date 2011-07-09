<?php

class Modelreports extends CI_Model {
    protected $items;
    
    function Modelreports() {
        parent::__construct();
        $this->items = "report";
    }

    function get_all() {
        $query = $this->db->get($this->items.$this->uri->segment(3));
        return $query->result();
    }    
}