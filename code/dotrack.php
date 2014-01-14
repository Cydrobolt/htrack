<?php
require("/incs/mysqlicxn.php");
require("/incs/blacklist.php");
$ip = @$_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$ref = @$_SERVER['HTTP_REFERER']||"NOT AVAILABLE";
$date = date("m/d/Y");
$query = "INSERT INTO info (ip,ua,referer,date,debug,fwr)
VALUES ('$ip','$ua','$ref','$date','sent','Normal Visitor')" or print('<!--ERROR DATABASE DOWN-->');
//fwr for future XSS/injection protection functions
$mysqli->query($query);
?>
