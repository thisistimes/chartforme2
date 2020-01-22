<?php
include("connect.php");
$id = $_POST["id"];
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "UPDATE stock SET name='".$name."', amount='".$amount."' WHERE id='".$id."' ";

if ($conn->query($sql) === TRUE) {
  	echo"<body onload=\"window.alert('Edit Complete'); return F-cart.php;\">";
	include("F-cart.php");
} else {
    echo "Error updating record: " . $conn->error;
}

?>
</body>
</html>