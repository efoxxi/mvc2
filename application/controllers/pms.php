<?php

include_once("IMP.php");

class Pms extends IMP {

    function edit() {
        $data['title'] = "Edit Project-Member";
        $data['heading'] = "Edit Project-Member";

        $data['query'] = $this->db->get_where('projectmembers', array('projectid' => $this->uri->segment(3), 'memberid'=>$this->uri->segment(4)));
        //$data['query'] = $this->db->get("projectmembers");
        $this->load->view('editpms', $data);
    }

}

?>
