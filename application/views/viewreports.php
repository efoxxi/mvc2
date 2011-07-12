<?php include_once("header.php"); ?>

<br /><h3><?php echo $report[$this->uri->segment(3)]; ?></h3>
<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
<tr>
<?php foreach ($res[0] as $columnname => $value) echo "<th>$columnname</th>\n"; ?>
</tr>
<?php
foreach ($res as $row) {
    echo "<tr>\n";
    foreach ($row as $value)
        echo "<td>$value</td>\n";
    echo "</tr>\n";
}
?>
</table>

<?php include_once("footer.php"); ?>