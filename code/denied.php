<?php
include("/incs/ht-config.php");
if($msgifdenied == ""){
echo"<img src=$logoloc alt=logo />
<br /><p>Your access was denied by the owner of this site. Contact $contacteml for more information    
";
}
else{
    echo $msgifdenied;
}
?>
