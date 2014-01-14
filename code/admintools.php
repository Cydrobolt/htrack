<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HT AdminTools</title>
    </head>
    <body>
        <?php
        require('asklogin.php');
        include("/incs/mysqlicxn.php");
        @$usertm = mysql_real_escape_string($_POST['tomod']);
        @$aod = $_POST['aod'];
        @$password2mod = $_POST['pass'];
        @$adminpass = $_POST['adminpass'];
        @$user = $_SESSION['USER'];
        @$GROUP = $_SESSION['GROUP'];
        $grptm = $_POST['group'];
        $rand = rand(0,99);
        $memsalt = md5($usertm.$password2mod.$rand);
        
        if(@$GROUP != md5('adm')) {
            die("You are not allowed to access this page. Administrator privilieges are required.");
        }
        
        $query="SELECT * FROM login WHERE loginName='$user'";
        $result = $mysqli->query($query); 
        $row = $result->fetch_assoc();
        
        if($row['password'] == $adminpass) {
            echo'Processing, please wait...<br />';
            if($aod == "Add") {
                $query1 = "SELECT password FROM login WHERE loginName='$usertm'";
                $result1 = $mysqli->query($query1);
                $row1 = $result1->fetch_assoc();
                if(!$row1['password']) {
                $query2 = "INSERT INTO login (loginName,password,group,memsalt) VALUES ('$usertm','$password2mod','$grptm','$memsalt')";
                $mysqli->query($query2)
                        or die("Error processing request: query2 UAP error<br />Done.");
                echo"$usertm successfully created as $grptm (adm = admin,mem = member [read only no creating members]) <a href=\"index.php\">Back</a><br />Done.";
                echo"<br />Memsalt: $memsalt";
                }
                else {
                    echo"<br />Username $usertm is already taken";
                }
            
            }
            if($aod == "Delete") {
                echo'wait!';
            }
        }
        else {
            echo'Processing, please wait...<p>Wrong password... <a href="index.php">Back</p>';
        }
        ?>
    </body>
</html>
