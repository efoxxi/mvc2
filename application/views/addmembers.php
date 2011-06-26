<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<?php echo form_open($this->uri->segment(1) . '/insert'); ?>
<p>Member ID:<br />
    <input type='text' name='id'></p>
<p>First Name:<br />
    <input type='text' name='name'></p>
<p>Last Name:<br />
    <input type='text' name='surname'></p>
<p><input type='submit' value='Submit'></p>
</form>

<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Members List</a> 	
<?php include_once("footer.php"); ?>
