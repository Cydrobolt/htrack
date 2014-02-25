<?php
//Perhaps array?
$IP = $_SERVER['REMOTE_ADDR'];
include("mysqlcxn.php");
$query = "SELECT ip FROM blacklist WHERE ip='{$IP}'";
$result = mysqli_query($cxn,$query);
$row = mysqli_fetch_assoc($result);
if($row){
        header("location:/Ptrack/denied.php");
        mysqli_free_result($result);
    }
    else{
        echo'<!--accepted-->';
        mysqli_free_result($result);
    }
else {
    echo'<!--blacklist empty-->';
}
?>
