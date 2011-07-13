<?php

include_once("header.php");
echo anchor('issues/add', 'Add Issue');


$arr[0] = array("Issue ID", "Issue", "Project ID", "Member ID", "Description", "Date", "Type", "Priority", "Status");
$r = 1; // row in table
foreach ($res as $row) {
    foreach ($row as $value) {
        $arr1[] = $value;
    }

    foreach ($this->db->query("SELECT projectid FROM projectmembers AS pm WHERE pm.id = " . $arr1[2])->result() as $result)
        $projectid = $result->projectid;
    foreach ($this->db->query("SELECT memberid FROM projectmembers AS pm WHERE pm.id = " . $arr1[2])->result() as $result)
        $memberid = $result->memberid;

    for ($i = 0; $i < count($arr1); $i++) {
        $arr2[] = $arr1[$i];
        if ($i == 2) {
            $arr2[2] = $projectid;
            $arr2[3] = $memberid;
        }
    }

    $c = 0;
    foreach ($arr2 as $value) {
        $arr[$r][$c] = $value;
        $c++;
    }
    unset($arr1, $arr2);

    $r++;
}

echotable($arr, $s1);

include_once("footer.php");
?>
