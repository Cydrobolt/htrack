<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>HtDashboard Login</title>
        <link rel="stylesheet" type="text/css" href="cssmain.css" />
    </head>
    <body>
        <?php
        echo'<div class="center">
            <h2>Login</h2>
            <form action="proclogin.php" method="POST">
            <input name="username" maxlength="15" type="text" placeholder="Username..." />
            <input name="password" maxlength="20" type="password" placeholder="Password..." /><br />
            <input name="submit" type="submit" value="Login"/>
            </form>
            </div>';
        ?>
    </body>
</html>
