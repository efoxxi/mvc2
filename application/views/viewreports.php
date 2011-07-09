<?php include_once("header.php");
echo "<br />\n";
echo anchor('reports/index/1', 'Report 1')."&nbsp;\n";
echo anchor('reports/index/2', 'Report 2')."&nbsp;\n";
echo anchor('reports/index/3', 'Report 3')."&nbsp;\n";
echo anchor('reports/index/4', 'Report 4 ')."&nbsp;\n";
echo anchor('reports/index/5', 'Report 5')."&nbsp;\n";
echo anchor('reports/index/6', 'Report 6')."\n";
?>

<br /><h3><?php echo $report; ?></h3>
<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <?php
        foreach ($res[0] as $columnname => $value)
            echo "<th>$columnname</th>\n";
        ?>
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