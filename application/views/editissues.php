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
        <select name="projectid">
            <?php
            foreach ($this->db->query("select id from projects")->result() as $project) {
                echo "<option ";
                if ($project->id == $row->projectid) { echo "selected "; }
                echo "value=\"" . $project->id . "\">" . $project->id . "</option>\n";
            }
            ?>    
        </select></p>
    <p>Member ID:<br />
        <select name="memberid">
            <?php
            foreach ($this->db->query("select id from members")->result() as $member) {
                echo "<option ";
                if ($member->id == $row->memberid) { echo "selected "; }
                echo "value=\"" . $member->id . "\">" . $member->id . "</option>\n";
            }
            ?>    
        </select></p>
    <p>Details:<br />
        <input type='text' name='details' value="<?php echo $row->details; ?>" /></p>
    <p>Date:<br />
        <input type='text' name='date' value="<?php echo $row->date; ?>" /></p>
    <p>Type:<br />
        <select name="type">
            <option <?php if($row->type == "general") { echo "selected"; } ?> value="general">General</option>
            <option <?php if($row->type == "bug") { echo "selected"; } ?> value="bug">Bug</option>
            <option <?php if($row->type == "requirement") { echo "selected"; } ?> value="requirement">Requirement</option>
        </select></p>
    <p>Priority:<br />
        <select name="priority">
            <option <?php if($row->priority == "high") { echo "selected"; } ?> value="high">High</option>
            <option <?php if($row->priority == "medium") { echo "selected"; } ?> value="medium">Medium</option>
            <option <?php if($row->priority == "low") { echo "selected"; } ?> value="low">Low</option>
        </select></p>
    <p>Status:<br />
        <select name="status">
            <option <?php if($row->status == "open") { echo "selected"; } ?> value="open">Open</option>
            <option <?php if($row->status == "resolved") { echo "selected"; } ?> value="resolved">Resolved</option>
            <option <?php if($row->status == "discarded") { echo "selected"; } ?> value="discarded">Discarded</option>
        </select></p>
    <p><input type='submit' value='Submit' /></p>
<?php } ?>
</form>
<a href ="<?php echo base_url(); ?>index.php/<?php echo $this->uri->segment(1); ?>/index">Back to Issues List</a> 	

<?php include_once("footer.php"); ?>


