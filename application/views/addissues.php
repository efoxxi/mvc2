<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<?php echo form_open($this->uri->segment(1) . '/insert'); ?>
<p>Issue:<br />
    <input type='text' name='issue'></p>
<p>Project ID:<br />
    <input type='text' name='projectid'></p>
<p>Member ID:<br />
    <input type='text' name='memberid'></p>
<p>Details:<br />
    <input type='text' name='details'></p>
<p>Date:<br />
    <input type='text' name='date'></p>
<p>Type:<br />
    <input type='text' name='type'></p>
<p>Priority:<br />
    <input type='text' name='priority'></p>
<p>Status:<br />
    <input type='text' name='status'></p>
<p><input type='submit' value='Submit'></p>
</form>

<a href ="<?php echo base_url(); ?>/index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Members List</a> 	
<?php include_once("footer.php"); ?>
