<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<form action="<?php echo base_url(); ?>index.php/members/update" method="post">
    <? //or using form helper //=form_open('blog/insertentry'); ?>

    <?php foreach ($query->result() as $row) { ?>
        <p>Member ID:<br />
            <input type='text' name='id' value="<?php echo $row->id; ?>"></p>
        <p>First Name:<br />
            <input type='text' name='name' value="<?php echo $row->name; ?>"></p>
        <p>Last Name:<br />
            <input type='text' name='surname' value="<?php echo $row->surname; ?>"></p>
        <p><input type='submit' value='Submit'></p>
    <?php } ?>
</form>

<?php include_once("footer.php"); ?>
