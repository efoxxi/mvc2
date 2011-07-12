<?php include_once("header.php"); ?>

<?php echo anchor('projectmembers/add', 'Add Project&lt;-&gt;Member'); ?>
<br />

<table>
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
            <td><?php echo anchor('projectmembers/edit/' . $row->id, 'Edit'); ?></td>
            <td><?php echo anchor('projectmembers/delete/' . $row->id, 'Delete'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>