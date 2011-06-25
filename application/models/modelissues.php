<?php

include_once("modelIMP.php");

class Modelissues extends ModelIMP {

    function Modelissues() {
        parent::__construct();
        $this->items = "issues";
    }

    function insert($data) {
        $this->id = "";
        $this->issue = $data['issue'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        
        $pms = $this->db->query("SELECT projectid, memberid FROM projectmembers")->result();
        $flag = false;
        foreach ($pms as $pm) {
            if($this->projectid == $pm->projectid && $this->memberid == $pm->memberid)
                $flag = true;
        }
        if($flag) $this->db->insert($this->items, $this);
        
        return $flag;
    }

    function update($data) {
        $this->issue = $data['issue'];
        $this->projectid = $data['projectid'];
        $this->memberid = $data['memberid'];
        $this->details = $data['details'];
        $this->date = $data['date'];
        $this->type = $data['type'];
        $this->priority = $data['priority'];
        $this->status = $data['status'];
        $pms = $this->db->query("SELECT projectid, memberid FROM projectmembers")->result();
        $flag = false;
        foreach ($pms as $pm) {
            if($this->projectid == $pm->projectid && $this->memberid == $pm->memberid)
                $flag = true;
        }
        if($flag) $this->db->update($this->items, $this, array('id' => $data['oldid']));
        
        return $flag;
    }

}