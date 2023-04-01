<?php  
session_start();
session_destroy();
header("location: ../src/login/index.php");
exit();
?>