<?php
$id = $_POST["id"];
setcookie("cart[$id]", "", time() - 3600, "/");
header("location: F-cartMe.php");
?>