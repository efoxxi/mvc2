<?php

class Empsmodel extends CI_Model {

    function Empsmodel() {
        parent::__construct();
    }

    function get_all_emps() {
        $query = $this->db->get('emps');
        return $query->result();
    }

    function insertemp($data) {
        $this->strEmployeeId = $data['strEmployeeId'];
        $this->strEmployeeFirstName = $data['strEmployeeFirstName'];
        $this->strEmployeeLastName = $data['strEmployeeLastName'];
        $this->strDepartmentName = $data['strDepartmentName'];
        $this->intSalary = $data['intSalary'];
        $this->db->insert('emps', $this);
    }

    function deleteemp() {
        //the id is part of the url in the link in the empsview
        //using sql in a query, but still using url helper
        $this->db->query('delete from emps where strEmployeeId = "' . $this->uri->segment(3) . '"');
        //ActiveRecord makes this easier, ie
        //$this->db->delete('emps', array('strEmployeeId' => $this->uri->segment(3)));
    }

    function restoreempdb() {
        $sql = explode(";", file_get_contents('sql-samples/emps.sql')); // 
        for($i = 0; $i < count($sql) - 1; $i++)
            $this->db->query($sql[$i]);
    }

}

?>
