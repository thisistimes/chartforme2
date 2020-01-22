<?php
include("connect.php");
$user = $_POST["user"];
$sql = "DELETE FROM login WHERE email='".$user."'";

if ($conn->query($sql) === TRUE) {
    echo"<body onload=\"window.alert('Deleted'); return F-reportMember.php;\">";
	include("F-reportMember.php");
}
?>
