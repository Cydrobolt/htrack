<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HTrack Dashboard - Summary of <?php echo date("m/d/y");?></title>
        <link rel="stylesheet" type="text/css" href="cssmain.css" />
    </head>
    <body>
        <?php
        require("asklogin.php");
        
        ?>
        <?php
        require("/incs/mysqlicxn.php");
        $today = date("m/d/Y");
        $query="SELECT * FROM info ORDER BY usrno DESC";
        $result = $mysqli ->query($query); 
        $row = $result -> fetch_assoc();
        
        $queryo="SELECT usrno FROM info WHERE date='$today'"; //daily visitors
        $resulto = $mysqli ->query($queryo); 
        $rowt = $result -> fetch_assoc();
        
        $tvt = count($rowt); //count no in array rowt 
        
        echo"<div style=\"text-align:right\">Welcome,{$_SESSION['USER']}.<br /><a href=\"logout.php\" title=\"logout\">Logout</a></div><div class=\"center\"><h1>HTrack Dashboard</h1><br />";
        echo"Visitors from the beginning of time: {$row['usrno']} <a href=\"da-details.php\">Details</a><br />";
        echo"Visitors today:$tvt <a href=\"da-todetails.php\">Details</a><br />";//Details stable but index display wrong
        
        
        if(@$_SESSION['GROUP'] == md5('adm')) {
            echo'<h2>Delete/add users</h2><br /><form action="admintools.php" method="POST">
                Username:<input type="text" name="tomod" />
                <select name="aod">
                <option>Add</option>
                <option>Delete</option>
                </select>
                <select name="group">
                <option>mem</option>
                <option>adm</option>
                </select>
                
                Password:<input type="password" name="pass" />
                Your Password:<input type="password" name="adminpass" />
                <input type="submit" value="Delete/Add User" />';
        }
        echo'</div>'
        ?>
    </body>
</html>
