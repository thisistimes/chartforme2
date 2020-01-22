<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { 

include("connect.php");
$id = $_POST["id"];
$old = $_POST["old"];
	
$sql = "SELECT * FROM stock WHERE id='".$id."'";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Quantity</title>
</head>
	<style>
		body{
			text-align: center;
			background : #F8F8FF;
		}
		
		input{
			margin-bottom: 1%;
		}
	</style>
<body>
	<h1>Edit Quantity</h1>
	<?php 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
	?>
	<form action="P-editCart.php" method="post">
		Product Name : <input type="text" name="name" value="<?php echo $row["name"]; ?>" readonly> <br>
		Old Quantity : <input type="text" name="old-amount" value="<?php echo $old ?>" readonly> <br>
		<!-- ตำแหน่งของสินค้า --><input type="hidden" name="index" value="<?php echo $id ?>">
		New Quantity : <input type="text" name="new-amount"> <br>
		<input type="submit" value="Confirm">
	</form>
	<?php }
	} else {
    	echo "0 results";	 
	}?>
</body>
</html>
<?php $conn->close(); } ?>



