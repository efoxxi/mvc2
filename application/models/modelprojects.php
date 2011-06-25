<?php

class ModelProjects extends CI_Model {

    function ModelProjects() {
        parent::__construct();
    }

    function get_all() {
        $query = $this->db->get('projects');
        return $query->result();
    }

    function insert($data) {
        $this->id = $data['id'];
        $this->projectDetails = $data['projectDetails'];
        $this->db->insert('projects', $this);
    }

    function update($data) {
        $this->id = $data['id'];
        $this->projectDetails = $data['projectDetails'];
        $this->db->update('projects', $this, array('id' => $data['oldid']));
    }

    function delete() {
        $this->db->query('delete from projects where id = "' . $this->uri->segment(3) . '"');
    }

    function restoredb() {
        $sql = explode(";", file_get_contents('sql-samples/assignment.sql')); // 
        for ($i = 0; $i < count($sql) - 1; $i++)
            $this->db->query($sql[$i]);
    }

}

?>
