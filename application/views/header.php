<?php
$s1 = $this->uri->segment(1);
$s3 = $this->uri->segment(3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Homepage / Mikhail Kotov / ID: 2708337</title>
<link href="<?php echo base_url()."css/style.css"; ?>" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="main">
  <div id="header"><img src="<?php echo base_url()."css/images/logo.png"; ?>" alt="" width="363" height="126" /></div>
  <br />
  <div id="menu1">
    <ul>
      <li><?php if($s1 == 'homepage') echo "<strong>"; echo anchor('homepage/index', 'Homepage'); if($s1 == 'homepage') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers') echo "<strong>"; echo anchor('issues/index', 'Tables'); if($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'reports') echo "<strong>"; echo anchor('reports/index/1', 'Reports'); if($s1 == 'reports') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'tools') echo "<strong>"; echo anchor('tools/index', 'Tools'); if($s1 == 'tools') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'about') echo "<strong>"; echo anchor('about/index', 'About'); if($s1 == 'about') echo "</strong>"; ?></li>
    </ul>
  </div>
  <br />
  <?php if($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers') { ?>
  <div id="menu2">
    <ul>
      <li><?php if($s1 == 'issues') echo "<strong>"; echo anchor('issues/index', 'Issues');  if($s1 == 'issues') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'members') echo "<strong>"; echo anchor('members/index', 'Members');  if($s1 == 'members') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'projects') echo "<strong>"; echo anchor('projects/index', 'Projects');  if($s1 == 'projects') echo "</strong>"; ?></li>
      <li><?php if($s1 == 'projectmembers') echo "<strong>"; echo anchor('projectmembers/index', 'Projects-Members');  if($s1 == 'projectmembers') echo "</strong>"; ?></li>
    </ul>
  </div>
  <?php }
  if($s1 == 'reports') { ?>
  <div id="menu2">
    <ul>
      <li><?php if($s3 == '1') echo "<strong>"; echo anchor('reports/index/1', 'Report-1');  if($s3 == '1') echo "</strong>"; ?></li>
      <li><?php if($s3 == '2') echo "<strong>"; echo anchor('reports/index/2', 'Report-2');  if($s3 == '2') echo "</strong>"; ?></li>
      <li><?php if($s3 == '3') echo "<strong>"; echo anchor('reports/index/3', 'Report-3');  if($s3 == '3') echo "</strong>"; ?></li>
      <li><?php if($s3 == '4') echo "<strong>"; echo anchor('reports/index/4', 'Report-4');  if($s3 == '4') echo "</strong>"; ?></li>
      <li><?php if($s3 == '5') echo "<strong>"; echo anchor('reports/index/5', 'Report-5');  if($s3 == '5') echo "</strong>"; ?></li>
      <li><?php if($s3 == '6') echo "<strong>"; echo anchor('reports/index/6', 'Report-6');  if($s3 == '6') echo "</strong>"; ?></li>
    </ul>
  </div>
  <?php } ?>
  
  <br />
  <h2>Homepage</h2>
  <br />
  