<?php

include_once("modelIMP.php");

class ModelPms extends ModelIMP {

    function ModelPms() {
        parent::__construct();
        $this->items = "projectmembers";
    }

    function insert($data) {
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->db->insert('projectmembers', $this);
    }

    function update($data) {
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];;
        $this->db->update('projectmembers', $this, array('projectid' => $data['oldprojectid']));
    }

}

?>