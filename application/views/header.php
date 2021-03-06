<?php
$s1 = $this->uri->segment(1);
$s2 = $this->uri->segment(2);
$s3 = $this->uri->segment(3);

function preparetable(&$arr, $res) {
    $r = 1; // row in table
    foreach ($res as $row) {
        $c = 0;
        foreach ($row as $value) {
            $arr[$r][$c] = $value;
            $c++;
        }
        $r++;
    }
}

function echotable($arr, $s1 = NULL) {
    $curr_h = 1; // color of row

    echo "<br />\n";
    echo "<table>\n";
    echo "<tr>\n";
    foreach ($arr[0] as $value)
        echo "<th>" . $value . "</th>\n";
    if (isset($s1)) {
        echo "<th>&nbsp;</th>\n";
        echo "<th>&nbsp;</th>\n";
    }
    echo "</tr>\n";

    for ($r = 1; $r < count($arr); $r++) {
        $row = $arr[$r];
        echo "<tr>\n";
        foreach ($row as $value)
            echo "<td class=\"h" . $curr_h . "\">" . $value . "</td>\n";
        if (isset($s1)) {
            echo "<td class=\"h" . $curr_h . "\">" . anchor($s1 . '/edit/' . $row[0], 'Edit') . "</td>\n";
            echo "<td class=\"h" . $curr_h . "\">" . anchor($s1 . '/delete/' . $row[0], 'Delete') . "</td>\n";
        }

        if ($curr_h == 1) {
            $curr_h = 2;
        } else {
            $curr_h = 1;
        }
    }
    echo "</table>\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url() . "css/style.css"; ?>" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="main">
            <div id="header"><img src="<?php echo base_url() . "css/images/logo.png"; ?>" alt="" width="363" height="126" /></div>
            <br />
            <div id="menu1">
                <ul>
                    <?php
                    echo "<li>";
                    if ($s1 == 'homepage')
                        echo "<strong>"; echo anchor('homepage/index', 'Homepage');
                    if ($s1 == 'homepage')
                        echo "</strong>"; echo "</li>\n<li>";

                    if ($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers')
                        echo "<strong>"; echo anchor('issues/index', 'Tables');
                    if ($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers')
                        echo "</strong>"; echo "</li>\n<li>";

                    if ($s1 == 'reports')
                        echo "<strong>"; echo anchor('reports/index/1', 'Reports');
                    if ($s1 == 'reports')
                        echo "</strong>"; echo "</li>\n<li>";

                    if ($s1 == 'tools')
                        echo "<strong>"; echo anchor('tools/index', 'Tools');
                    if ($s1 == 'tools')
                        echo "</strong>"; echo "</li>\n<li>";
                    ?>
                </ul>
            </div>
            <br />
            <?php if ($s1 == 'issues' || $s1 == 'members' || $s1 == 'projects' || $s1 == 'projectmembers') { ?>
                <div id="menu2">
                    <ul>
                        <li><?php
            if ($s1 == 'issues')
                echo "<strong>"; echo anchor('issues/index', 'Issues');
            if ($s1 == 'issues')
                echo "</strong>";
            echo "</li>\n<li>";
            if ($s1 == 'members')
                echo "<strong>"; echo anchor('members/index', 'Members');
            if ($s1 == 'members')
                echo "</strong>";
            echo "</li>\n<li>";
            if ($s1 == 'projects')
                echo "<strong>"; echo anchor('projects/index', 'Projects');
            if ($s1 == 'projects')
                echo "</strong>";
            echo "</li>\n<li>";
            if ($s1 == 'projectmembers')
                echo "<strong>"; echo anchor('projectmembers/index', 'Projects-Members');
            if ($s1 == 'projectmembers')
                echo "</strong>";
            echo "</li>\n";
            ?>
                    </ul>
                </div>
                    <?php }
                    if ($s1 == 'reports') { ?>
                <div id="menu2">
                    <ul>
                        <?php
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<li>";
                            if ($s3 == $i)
                                echo "<strong>"; echo anchor('reports/index/' . $i, 'Report-' . $i);
                            if ($s3 == $i)
                                echo "</strong>";
                            echo "</li>\n";
                        }
                        ?>
                    </ul>
                </div>
<?php } ?>

            <br />
            <br />
            <h2><?php echo $heading; ?> </h2>
            <br />
