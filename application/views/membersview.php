<?php include_once("header.php"); ?>

<?php echo anchor('members/add', 'Add Member'); ?>
<br />
<?php echo anchor('members/restoredb', 'Restore DB'); ?>

<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <th>Member ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->surname; ?></td>
            <td><?php echo anchor('members/edit' . $row->id, 'Edit'); ?></td>
            <td><?php echo anchor('members/delete/' . $row->id, 'Delete'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>