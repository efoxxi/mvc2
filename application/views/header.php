<html>
    <head>
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1>This page is a draft. Last update: 10 of July 2011</h1>
        <h2><?php echo $heading ?></h2>
        <h3><?php
        echo anchor('members/index', 'Member')."&nbsp;\n";
        echo anchor('projects/index', 'Projects')."&nbsp;\n";
        echo anchor('issues/index', 'Issues')."&nbsp;\n";
        echo anchor('projectmembers/index', 'Project&lt;-&gt;Members')."&nbsp;\n";
        echo anchor('reports/index/1', 'Reports')."&nbsp;\n"; 
        ?>
        </h3>