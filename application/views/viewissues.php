<?php include_once("header.php"); ?>

<?php
echo anchor('issues/add', 'Add Issue');

$curr_h = 1;
function echotd($curr_h) { echo "<td class=\"h" . $curr_h . "\">"; }
?>
<br />

<table class="h2">
    <tr>
        <th>Issue</th>
        <th>Project ID</th>
        <th>Member ID</th>
        <th>Description</th>
        <th>Date</th>
        <th>Type</th>
        <th>Priority</th>
        <th>Status</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach ($res as $row) {
        echo "<tr>\n";

        foreach ($row as $value) {
            $arr1[] = $value;
        }
        
        foreach ($this->db->query("SELECT projectid FROM projectmembers AS pm WHERE pm.id = " . $arr1[2])->result() as $result)
                $projectid = $result->projectid;
        foreach ($this->db->query("SELECT memberid FROM projectmembers AS pm WHERE pm.id = " . $arr1[2])->result() as $result)
                $memberid = $result->memberid;

        for($i = 1; $i < count($arr1); $i++) {
            $arr2[] = $arr1[$i];
            if($i == 2) {
                $arr2[1] = $projectid;
                $arr2[2] = $memberid;
            }
        }
        unset($arr1);
        
        foreach ($arr2 as $value) {
            echotd($curr_h);
            echo $value . "</td>\n";;
        }
        unset($arr2);

        echotd($curr_h);
        echo anchor('issues/edit/' . $row->id, 'Edit');
        echo "</td>\n";

        echotd($curr_h);
        echo anchor('issues/delete/' . $row->id, 'Delete');
        echo "</td>\n";

        if ($curr_h == 1) {
            $curr_h = 2;
        } else {
            $curr_h = 1;
        }
        echo "</tr>\n";
    }
    ?>
</table>

<?php include_once("footer.php"); ?>