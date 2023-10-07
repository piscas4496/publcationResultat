<?php 
session_start();
$_SESSION = array();
session_destroy();

header("Location:../formulaires/index.php");
 ?>