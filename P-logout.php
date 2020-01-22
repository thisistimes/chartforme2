<?php
session_start();
session_destroy();
header("location: F-login.php");	
?>