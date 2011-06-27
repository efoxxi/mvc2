<?php

include_once("IMP.php");

class Pms extends IMP {

    function edit() {
        $data['title'] = "Edit Project&lt;-&gt;Members";
        $data['heading'] = "Edit Project&lt;-&gt;Members";

        $this->db->where('id', $this->uri->segment(3));
        $data['query'] = $this->db->get("projectmembers");
        $this->load->view('editpms', $data);
    }

}

?>
