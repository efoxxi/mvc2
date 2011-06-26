<?php
include_once("modelIMP.php");

class ModelProjects extends ModelIMP {

    function ModelProjects() {
        parent::__construct();
        $this->items = "projects";
    }

    function insert($data) {
        $this->id = $data['id'];
        $this->details = $data['details'];
        $this->db->insert($this->items, $this);
    }

    function update($data) {
        $this->id = $data['id'];
        $this->details = $data['details'];
        $this->db->update($this->items, $this, array('id' => $data['oldid']));
    }

}

?>
