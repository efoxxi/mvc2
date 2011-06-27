<?php include_once("header.php"); ?>

<?php echo anchor('issues/add', 'Add Issue'); ?>
<br />

<table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <th>Issue</th>        
        <th>Project ID</th>
        <th>Member ID</th>
        <th>Description</th>
        <th>Date</th>
        <th>Type</th>
        <th>Priority</th>
        <th>Status</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row->issue; ?></td>
            <td><?php foreach ($this->db->query("SELECT projectid FROM projectmembers AS pm WHERE pm.id = " . $row->pmid)->result() as $result) echo $result->projectid; ?></td>
            <td><?php foreach ($this->db->query("SELECT memberid FROM projectmembers AS pm WHERE pm.id = " . $row->pmid)->result() as $result) echo $result->memberid; ?></td>
            <td><?php echo $row->details; ?></td>
            <td><?php echo $row->date; ?></td>
            <td><?php echo $row->type; ?></td>
            <td><?php echo $row->priority; ?></td>
            <td><?php echo $row->status; ?></td>
            <td><?php echo anchor('issues/edit/' . $row->id, 'Edit'); ?></td>
            <td><?php echo anchor('issues/delete/' . $row->id, 'Delete'); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include_once("footer.php"); ?>