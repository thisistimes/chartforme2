<?php
include("connect.php");
$user = $_POST["user"];
$pass = $_POST["pass"];

$sql = "INSERT INTO login (email, password)
VALUES ('".$user."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
	echo"<body onload=\"window.alert('Complete'); return F-login.php;\">";
	include("F-login.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>