<?php include_once("header.php"); ?>

<h3>Edit details below</h3>	

<?php echo form_open($this->uri->segment(1).'/update'); ?>
<?php foreach ($query->result() as $row) { ?>
        <input type='hidden' name='oldid' value="<?php echo $row->id; ?>" />
    <p>Issue ID:<br />
        <input type='text' name='id' value="<?php echo $row->id; ?>" readonly /></p>
    <p>Issue:<br />
        <input type='text' name='issue' value="<?php echo $row->issue; ?>" /></p>
    <p>Project ID:<br />
        <input type='text' name='projectid' value="<?php echo $row->projectid; ?>" /></p>
    <p>Member ID:<br />
        <input type='text' name='memberid' value="<?php echo $row->memberid; ?>" /></p>
    <p>Details:<br />
        <input type='text' name='details' value="<?php echo $row->details; ?>" /></p>
    <p>Date:<br />
        <input type='text' name='date' value="<?php echo $row->date; ?>" /></p>
    <p>Type:<br />
        <input type='text' name='type' value="<?php echo $row->type; ?>" /></p>
    <p>Priority:<br />
        <input type='text' name='priority' value="<?php echo $row->priority; ?>" /></p>
    <p>Status:<br />
        <input type='text' name='status' value="<?php echo $row->status; ?>" /></p>
    <p><input type='submit' value='Submit' /></p>
<?php } ?>
</form>
<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Issues List</a> 	

<?php include_once("footer.php"); ?>
