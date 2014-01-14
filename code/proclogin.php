<?php
include("/incs/mysqlicxn.php");
$usr = $_POST['username'];
$pas = $_POST['password'];

$query = "SELECT * FROM login WHERE loginName='$usr'";
$result = $mysqli->query($query) or die("Could not execute query, failed to login");

$row = $result->fetch_assoc();

if($pas == $row['password'] && $pas != "") {
    echo'<b>Login successful</b>';
    session_start();
    @$_SESSION['LOGGED'] = "YSLOGGED";
    @$_SESSION['USER'] = $usr;
    @$_SESSION['GROUP'] = md5($row['group']);
    echo'<form method=POST action="index.php">
        <input type="hidden" name="logged" value="yslogged" />
        <input type="submit" value="Continue" />
        </form>';
    }
else {
    echo"<b>INVALID PASSWORD/USERNAME '{$usr}'</b>";
    include("login.php");
}
?>
