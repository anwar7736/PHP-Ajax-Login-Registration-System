<?php 
session_start();
setcookie("CurrentUser","",time()-(86400*7));
header("location:Login.php");


?>