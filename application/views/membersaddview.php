<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<form action="<?php echo base_url(); ?>index.php/members/insert" method="post">
    <? //or using form helper //=form_open('blog/insertentry');?>

    <p>Member ID:<br />
        <input type='text' name='id'></p>
    <p>First Name:<br />
        <input type='text' name='name'></p>
    <p>Last Name:<br />
        <input type='text' name='surname'></p>
    <p><input type='submit' value='Submit'></p>

</form>

<?php include_once("footer.php"); ?>
