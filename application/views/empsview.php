<html>
    <head>
        <title>Display All Employees</title>
    </head>
    <body>
        <p><?= $heading ?></p>

        <?php echo anchor('emps/addemp', 'Add Employee'); ?>
        <table width="57%" border="1" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <th>Employee ID</th>
                <th>Employee First Name</th>
                <th>Employee Last Name</th>
                <th>Department</th>
                <th>Salary</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($res as $row): ?>
                <tr>
                    <td><?php echo $row->strEmployeeId; ?></td>
                    <td><?php echo $row->strEmployeeFirstName; ?></td>
                    <td><?php echo $row->strEmployeeLastName; ?></td>
                    <td><?php echo $row->strDepartmentName; ?></td>
                    <td><?php echo $row->intSalary ?></td>
                    <td><?php echo anchor('emps/deleteemp/' . $row->strEmployeeId, 'Delete'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
