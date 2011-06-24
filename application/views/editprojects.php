<?php include_once("header.php"); ?>

<h3>Edit details below</h3>	

<?php echo form_open($this->uri->segment(1).'/update'); ?>
<?php foreach ($query->result() as $row) { ?>
        <input type='hidden' name='oldid' value="<?php echo $row->id; ?>">
    <p>Project ID:<br />
        <input type='text' name='id' value="<?php echo $row->id; ?>"></p>
    <p>Description:<br />
        <input type='text' name='projectDetails' value="<?php echo $row->projectDetails; ?>"></p>
    <p><input type='submit' value='Submit'></p>
<?php } ?>
</form>
<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Projects List</a> 	

<?php include_once("footer.php"); ?>
