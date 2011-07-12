<?php include_once("header.php"); ?>

<?php echo anchor('projects/add', 'Add Project'); ?>
<br />

<table>
    <tr>
        <th>Project ID</th>
        <th>Description</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->details; ?></td>
            <td><?php echo anchor('projects/edit/' . $row->id, 'Edit'); ?></td>
            <td><?php echo anchor('projects/delete/' . $row->id, 'Delete'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>