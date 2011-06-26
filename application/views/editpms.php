<?php include_once("header.php"); ?>

<h3>Edit details below</h3>	

<?php echo form_open($this->uri->segment(1).'/update'); ?>
<?php foreach ($query->result() as $row) { ?>
        <input type='hidden' name='oldprojectid' value="<?php echo $row->projectid; ?>" />
        <input type='hidden' name='oldmemberid' value="<?php echo $row->memberid; ?>" />
    <p>Project ID:<br />
    <select name="projectid">
        <?php
        foreach ($this->db->query("select id from projects")->result() as $project) {
            echo "<option ";
            if($project->id == $row->projectid) { echo "selected ";  }
            echo "value=\"" . $project->id . "\">" . $project->id . "</option>\n";
        }
        ?>    
    </select></p>
    <p>Member ID:<br />
    <select name="memberid">
        <?php
        foreach ($this->db->query("select id from members")->result() as $member) {
            echo "<option ";
            if($member->id == $row->memberid) { echo "selected ";  }
            echo "value=\"" . $member->id . "\">" . $member->id . "</option>\n";
        }
        ?>    
    </select></p>
    <p><input type='submit' value='Submit' /></p>
<?php } ?>
</form>
<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Project&lt;-&gt;Members List</a> 	

<?php include_once("footer.php"); ?>

