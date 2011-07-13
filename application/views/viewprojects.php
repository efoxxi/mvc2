<?php
include_once("header.php");
echo anchor('projects/add', 'Add Project');

$arr[0] = array("Project ID", "Description");
preparetable($arr, $res);
echotable($arr, $s1);

include_once("footer.php");
?>