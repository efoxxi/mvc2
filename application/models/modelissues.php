<?php

include_once("modelIMP.php");

class Modelissues extends ModelIMP {

    function Modelissues() {
        parent::__construct();
        $this->items = "issues";
    }
    
    
    function get_all() {
        $query = $this->db->query('SELECT id, issue, pmid, details, date, type, priority, status FROM issues');
        return $query->result();
    }

    function delete() {
        $this->db->query('delete from ' . $this->items . ' where id = "' . $this->uri->segment(3) . '"');
    }

    function insert($data) {
        $this->id = "";
        $this->pmid = $data['pmid'];
        $this->issue = $data['issue'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->insert($this->items, $this);
    }

    function update($data) {
        $this->issue = $data['issue'];
        $this->pmid = $data['pmid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->update($this->items, $this, array('id' => $data['oldid']));
    }

}