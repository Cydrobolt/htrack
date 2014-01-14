<?php
//Review consider changing to fwrite & fread instead database
//Errors,errors
//
//
$IP = $_SERVER['REMOTE_ADDR'];
include("mysqlcxn.php");
$query = "SELECT ip FROM blacklist";
$result = mysqli_query($cxn,$query);
$row = mysqli_fetch_assoc($result);
if($row != ""){
foreach($row as $val){
    if($val==$IP){
        header("location:/Ptrack/denied.php");
        mysqli_free_result($result);
    }
    else{
        echo'<!--accepted-->';
        mysqli_free_result($result);
    }
    
}
}
else {
    echo'<!--blacklist empty-->';
}
?>
