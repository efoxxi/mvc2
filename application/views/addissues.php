<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<?php echo form_open($this->uri->segment(1) . '/insert'); ?>
<p>Issue:<br />
    <input type='text' name='issue'></p>
<p>Project&lt;-&gt;Member ID:<br />
    <select name="pmid">
        <?php
        foreach ($this->db->query("SELECT projectid, memberid FROM projectmembers")->result() as $pm) {
            echo "<option ";
            echo "value=\"" . $pm->projectid . "/". $pm->memberid. "\">" . $pm->projectid . "/".$pm->memberid."</option>\n";
        }
        ?>    
    </select></p>
<p>Details:<br />
    <input type='text' name='details'></p>
<p>Date:<br />
    <input type='text' name='date'></p>
<p>Type:<br />
    <select name="type">
        <option selected value="general">General</option>
        <option value="bug">Bug</option>
        <option value="requirement">Requirement</option>
    </select></p>
<p>Priority:<br />
    <select name="priority">
        <option value="high">High</option>
        <option selected value="medium">Medium</option>
        <option value="low">Low</option>
    </select></p>
<p>Status:<br />
    <select name="status">
        <option selected value="open">Open</option>
        <option value="resolved">Resolved</option>
        <option value="discarded">Discarded</option>
    </select></p>
<p><input type='submit' value='Submit'></p>
</form>

<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Members List</a> 	
<?php include_once("footer.php"); ?>
