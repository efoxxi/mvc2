<?php

include_once("IMP.php");

class Issues extends IMP {
    
    function insert() {
        $data = $_POST;
        if($this->modelissues->insert($data))
            redirect('issues/index');
        else
            echo "This combination of Project ID & Memember ID is not exists in Project<->Member List";
    }
    
    function update() {
        $data = $_POST;
        if($this->modelissues->update($data))
            redirect('issues/index');
        else
            echo "This combination of Project ID & Memember ID is not exists in Project<->Member List";
    }

}

?>