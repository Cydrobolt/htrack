        <?php
        if (!isset($_SESSION)) {
        session_start();
        }
        if(@$_SESSION['LOGGED']!="YSLOGGED"){
            header("location:login.php");
        }
        else{
           echo"<!--Logged in as {$_SESSION['USER']}-->";
        }
        ?>

