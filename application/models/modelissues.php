<?php

include_once("modelIMP.php");

class Modelissues extends ModelIMP {

    function Modelissues() {
        parent::__construct();
        $this->items = "issues";
    }

    function insert($data) {
        $this->id = "NULL";
        $this->issue = $data['issue'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->insert($this->items, $this);
    }

    function update($data) {
        $this->issue = $data['issue'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->update($this->items, $this, array('id' => $data['oldid']));
    }

}