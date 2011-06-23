<?php

class Membersmodel extends CI_Model {

    function Membersmodel() {
        parent::__construct();
    }

    function get_all_members() {
        $query = $this->db->get('members');
        return $query->result();
    }

    function get_current_member() {
        $query = $this->db->get('members where id="' . $this->uri->segment(3) . '"');
        return $query->result();
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
        $this->db->update('members', $this, array('id' => $data['id']));
    }

    function delete() {
        $this->db->query('delete from members where id = "' . $this->uri->segment(3) . '"');
    }

    function restoredb() {
        $sql = explode(";", file_get_contents('sql-samples/assignment.sql')); // 
        for ($i = 0; $i < count($sql) - 1; $i++)
            $this->db->query($sql[$i]);
    }

}

?>
