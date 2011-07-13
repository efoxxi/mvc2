<?php
include_once("header.php");
echo anchor('projectmembers/add', 'Add Project&lt;-&gt;Member');

$arr[0] = array("ID", "Project ID", "Member ID");
preparetable($arr, $res);
echotable($arr, $s1);

include_once("footer.php");
?>
