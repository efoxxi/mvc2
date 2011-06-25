<?php

class Modelissues extends CI_Model {

    function Modelissues() {
        parent::__construct();
    }

    function get_all() {
        $query = $this->db->get('issues');
        return $query->result();
    }

    function insert($data) {
        $this->id = $data['id'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->insert('issues', $this);
    }

    function update($data) {
        $this->id = $data['id'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $this->db->update('issues', $this, array('id' => $data['oldid']));
    }

    function delete() {
        $this->db->query('delete from issues where id = "' . $this->uri->segment(3) . '"');
    }

    function restoredb() {
        $sql = explode(";", file_get_contents('sql-samples/assignment.sql')); // 
        for ($i = 0; $i < count($sql) - 1; $i++)
            $this->db->query($sql[$i]);
    }

}