<?php
include_once("header.php");

echo "<br /><h3>" . $report[$this->uri->segment(3)] . "</h3>";

foreach ($res[0] as $columnname => $value) $arr[0][] = $columnname;
preparetable($arr, $res);
echotable($arr);

include_once("footer.php");
?>
