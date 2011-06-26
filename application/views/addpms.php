<?php include_once("header.php"); ?>

<h3>Enter new details below</h3>	

<?php echo form_open($this->uri->segment(1) . '/insert'); ?>
<p>Project ID:<br />
    <select name="projectid">
        <?php
        foreach ($this->db->query("select id from projects")->result() as $project) {
            echo "<option ";
            echo "value=\"" . $project->id . "\">" . $project->id . "</option>\n";
        }
        ?>    
    </select></p>
<p>Member ID:<br />
    <select name="memberid">
        <?php
        foreach ($this->db->query("select id from members")->result() as $member) {
            echo "<option ";
            echo "value=\"" . $member->id . "\">" . $member->id . "</option>\n";
        }
        ?>    
    </select></p>
<p><input type='submit' value='Submit'></p>
</form>

<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Project&lt;-&gt;Members List</a> 	
<?php include_once("footer.php"); ?>
