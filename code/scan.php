<?php
###
#  Web Application Firewall
#  
#  v0.1
###

if (!isset($_SESSION)) {
        session_start();
}

foreach ($_GET as &$value) {
        clean($value);
}
foreach ($_POST as &$value) {
        clean($value);
}
foreach ($_COOKIE as &$value) {
        clean($value);
}
foreach ($_SESSION as &$value) {
        clean($value);
}

function clean($value) {
        $value = urldecode($value);
        
        $regexArray[] = "/((\%3D)|(=))[^\n]*((\%27)|(\')|(\-\-)|(\%3B)|(;))/i";
        $regexArray[] = "/\w*((\%27)|(\'))((\%6F)|o|(\%4F))((\%72)|r|(\%52))/ix";
        $regexArray[] = "/exec(\s|\+)+(s|x)p\w+/ix";
        $regexArray[] = "/((\%3C)|<)((\%2F)|\/)*[a-z0-9\%]+((\%3E)|>)/ix";
        $regexArray[] = "/((\%3C)|<)((\%69)|i|(\%49))((\%6D)|m|(\%4D))((\%67)|g|(\%47))[^\n]+((\%3E)|>)/I";
        $regexArray[] = "/((\%3C)|<)[^\n]+((\%3E)|>)/I";
        
        foreach ($regexArray as $regex) {
                if (@preg_match($regex,$value,$matches)) {
                        detected();
                }
        }
}

function detected() {
    require("/incs/mysqlcxn.php");
    $ip = @$_SERVER['REMOTE_ADDR'];
    $date = date("j/d/Y");
    $query = "INSERT INTO blacklist (ip,iaut,date)
    VALUES ('$ip','Automatic Blacklisting:Injection attack','$date')" or die('<!--ERROR DATABASE DOWN--><b>Please refrain from  attacking sites');
    //fwr for future XSS/injection protection functions
    $do = mysqli_query($cxn,$query);
    die("Please refrain from attacking other websites.");
    }
?>
