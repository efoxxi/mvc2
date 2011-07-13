<?php
include_once("header.php");
echo anchor('members/add', 'Add Member');

$arr[0] = array("Member ID", "First Name", "Last Name");
preparetable($arr, $res);
echotable($arr, $s1);

include_once("footer.php");
?>