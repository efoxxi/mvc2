<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<form action="<?php echo base_url(); ?>index.php/emps/insertemp" method="post">
    <? //or using form helper //=form_open('blog/insertentry');?>

    <p>Employee ID:<br />
        <input type='text' name='strEmployeeId'></p>
    <p>First Name:<br />
        <input type='text' name='strEmployeeFirstName'></p>
    <p>Last Name:<br>
        <input type='text' name='strEmployeeLastName'></p>
    <p>Department:<br />
        <input type='text' name='strDepartmentName'></p>
    <p>Salary:<br />
        <input type='text' name='intSalary'></p>

    <p><input type='submit' value='Submit'></p>

</form>

<?php include_once("footer.php"); ?>
