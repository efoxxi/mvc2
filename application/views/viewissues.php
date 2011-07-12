<?php

include_once("header.php");
echo anchor('issues/add', 'Add Issue');

function echotable($arr) {
    $curr_h = 1; // color of row

    echo "<br />\n";
    echo "<table>\n";
    echo "<tr>\n";
    foreach ($arr[0] as $value)
        echo "<th>" . $value . "</th>\n";
    echo "</tr>\n";

    for ($r = 1; $r < count($arr); $r++) {
        $row = $arr[$r];
        echo "<tr>\n";
        foreach ($row as $value)
            echo "<td class=\"h" . $curr_h . "\">" . $value . "</td>\n";
        echo "<td class=\"h" . $curr_h . "\">" . anchor('issues/edit/' .   $row[0], 'Edit')   . "</td>\n";
        echo "<td class=\"h" . $curr_h . "\">" . anchor('issues/delete/' . $row[0], 'Delete') . "</td>\n";
        
        if ($curr_h == 1) {
            $curr_h = 2;
        } else {
            $curr_h = 1;
        }
    }
    echo "</table>\n";
}

$arr3[0] = array("Issue ID", "Issue", "Project ID", "Member ID", "Description", "Date", "Type", "Priority", "Status", "&nbsp;", "&nbsp;");
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
        $arr3[$r][$c] = $value;
        $c++;
    }
    unset($arr1, $arr2);

    $r++;
}

echotable($arr3);

include_once("footer.php");
?>
