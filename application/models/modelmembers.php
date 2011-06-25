<?php

include_once("modelIMP.php");

class ModelMembers extends ModelIMP {

    function ModelMembers() {
        parent::__construct();
        $this->items = "members";
    }

    function insert($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->db->insert('members', $this);
    }

    function update($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->db->update('members', $this, array('id' => $data['oldid']));
    }

}

?>
