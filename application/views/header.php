<html>
    <head>
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1>This page is a draft. The assignments will be finished by 1 of July 2011</h1>
        <h2><?php echo $heading ?></h2>
        <h3>
        <?php echo anchor('members/index', 'Member'); ?>
        <?php echo anchor('projects/index', 'Projects'); ?>
        <?php echo anchor('issues/index', 'Issues'); ?>
        <?php echo anchor('pms/index', 'Project-Members'); ?>
        </h3>