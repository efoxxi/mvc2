<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<?php echo form_open($this->uri->segment(1) . '/insert'); ?>
<p>Project ID:<br />
    <input type='text' name='id'></p>
<p>Description:<br />
    <input type='text' name='projectDetails'></p>
<p><input type='submit' value='Submit'></p>
</form>

<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Projects List</a> 	
<?php include_once("footer.php"); ?>

