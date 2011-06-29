<?php include_once("header.php"); ?>

<br /><h3><?php echo $report; ?></h3>
<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <th>Issue</th>        
        <th>Issue Details</th>
        <th>Member First Name</th>
        <th>Member Last Name</th>
        <th>Project</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row->issue; ?></td>
            <td><?php echo $row->details; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->surname; ?></td>
            <td><?php echo $row->projectname; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>