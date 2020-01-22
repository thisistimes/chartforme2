<?php
include("connect.php");
$id = $_POST["id"];

$sql = "DELETE FROM stock WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
	echo"<body onload=\"window.alert('Deleted'); return F-cart.php;\">";
	include("F-cart.php");	
    
}
?>
