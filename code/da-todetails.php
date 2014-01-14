
<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>Details:Beggening of time</h1>
        <?php
        require("asklogin.php");
        include("/incs/mysqlicxn.php");
        $query = "SELECT * FROM  `info` ORDER BY usrno";
        $result = $mysqli->query($query);
        $today = date("m/d/Y");
        while ($row = $result->fetch_assoc()) 
        { 
        $field1= $row['usrno']; 
        $field2= $row['date']; //if date = today then disp
        $field3= $row['ip']; 
        $field4= $row['ua']; 
        if($field2 == $today) {
        echo "$field1  |--|  "; 
        echo "$field2  |--|  "; 
        echo "$field3  |--|  "; 
        echo "$field4<br />";
        }

        } 
        echo'<br /><br />Reset usrno: <a href="resetusrno.php">Here</a>';
        echo'   <a href="index.php">Back</a>      <a href="da-todetails.php">Today\'s report</a>';
        ?>
    </body>
</html>
