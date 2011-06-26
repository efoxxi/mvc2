<?php include_once("header.php"); ?>

<h3>Edit details below</h3>	

<?php echo form_open($this->uri->segment(1).'/update'); ?>
<?php foreach ($query->result() as $row) { ?>
        <input type='hidden' name='oldmemberid' value="<?php echo $row->projectid; ?>" />
        <input type='hidden' name='oldprojectid' value="<?php echo $row->memberid; ?>" />
    <p>Project ID:<br />
        <input type='text' name='projectid' value="<?php echo $row->projectid; ?>" /></p>
    <p>Member ID:<br />
        <input type='text' name='memberid' value="<?php echo $row->memberid; ?>" /></p>
    <p><input type='submit' value='Submit' /></p>
<?php } ?>
</form>
<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Project-Members List</a> 	

<?php include_once("footer.php"); ?>

