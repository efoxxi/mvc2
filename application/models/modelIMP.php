<?php

class ModelIMP extends CI_Model {

    protected $items;

    function ModelIMP() {
        parent::__construct();
    }

    function get_all() {
        $query = $this->db->get($this->items);
        return $query->result();
    }

    function delete() {
        $this->db->query('delete from ' . $this->items . ' where id = "' . $this->uri->segment(3) . '"');
    }

    function restoredb() {
        $sql = explode(";", file_get_contents('sql-samples/assignment.sql')); // 
        for ($i = 0; $i < count($sql) - 1; $i++)
            $this->db->query($sql[$i]);
    }

}

?>
