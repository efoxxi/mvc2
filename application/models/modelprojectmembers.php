<?php

include_once("modelIMP.php");

class ModelProjectmembers extends ModelIMP {

    function ModelProjectmembers() {
        parent::__construct();
        $this->items = "projectmembers";
    }

    function get_all() {
        $this->db->order_by("projectid, memberid");
        $query = $this->db->get("projectmembers");
        return $query->result();
    }

    function insert($data) {
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->db->insert('projectmembers', $this);
    }

    function update($data) {
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        ;
        $this->db->update('projectmembers', $this, array('id' => $data['oldid']));
    }

}

?>
