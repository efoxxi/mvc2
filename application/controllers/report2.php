<?php

include_once("report1.php");

class Report2 extends Report1 { 
    
    function index() {
        $data['title'] = "Report";
        $data['heading'] = "Report";
        $data['report'] = "Members where Issues is High priority";
        $data['res'] = $this->{$this->modelitems}->get_all();
        $this->load->view('view' . $this->items, $data);
    }
    
}

?>