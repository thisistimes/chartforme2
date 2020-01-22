<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { 

include("connect.php");
$id = $_POST["id"];
	
$sql = "SELECT * FROM stock WHERE id='".$id."'";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Product</title>
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
	<h1>Edit Product</h1>
	<?php 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
	?>
	<form action="P-editProduct.php" method="post">
		Product ID : <input type="text" name="id" value="<?php echo $row["id"]; ?>" readonly> <br>
		Product Name : <input type="text" name="name" value="<?php echo $row["name"]; ?>"> <br>
		Quantity : <input type="text" name="amount" value="<?php echo $row["amount"]; ?>"> <br>
		<input type="submit" value="Confirm">
	</form>
	<?php }
	} else {
    	echo "0 results";
	} ?>
</body>
</html>
<?php $conn->close(); } ?>