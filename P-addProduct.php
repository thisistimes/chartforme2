<?php
include("connect.php");
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "INSERT INTO stock (name, amount)
VALUES ('".$name."', '".$amount."')";

if ($conn->query($sql) === TRUE) {
	echo"<body onload=\"window.alert('Add Complete'); return F-cart.php;\">";
	include("F-cart.php");

}
?>