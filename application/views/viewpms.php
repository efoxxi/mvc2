<?php include_once("header.php"); ?>

<?php echo anchor('pms/add', 'Add Project&lt;-&gt;Member'); ?>
<br />
<?php echo anchor('pms/restoredb', 'Restore DB'); ?>

<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <th>Project ID</th>
        <th>Member ID</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row->projectid; ?></td>
            <td><?php echo $row->memberid; ?></td>
            <td><?php echo anchor('pms/edit/' . $row->projectid . "/" . $row->memberid, 'Edit'); ?></td>
            <td><?php echo anchor('pms/delete/' . $row->projectid . "/" . $row->memberid, 'Delete'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>