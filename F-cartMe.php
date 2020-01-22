<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { 

include("connect.php");	   
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Cart</title>
</head>
	<style>
		body{
			text-align: center;
			background : #F8F8FF;
		}
		table, td, th{
			border: 1px solid black;
			margin-bottom: 2%;
		}
	</style>
<body>
	<h2>My Cart</h2>
	<table align="center">
		<tr>
			<th>Product Name</th>
			<th>Quantity</th>
			<th colspan="2">Selected</th>
		</tr>
		<?php 
		if(isset($_COOKIE["cart"])) {
			foreach($_COOKIE["cart"] as $index => $valus) {
				$sql = "SELECT * FROM stock WHERE id='".$index."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    				while($row = $result->fetch_assoc()) {
		?>	
		<tr>
    		<td><?php echo $row["name"]; ?></td>
			<td><?php echo $valus; ?></td>
			<td>
				<form action="F-editQtyMe.php" method="post">
					<!-- ค่าจำนวนสินค้าตัวเก่า --><input type="hidden" name="old" value="<?php echo $valus; ?>">
					<button type="submit" name="id" value="<?php echo $index; ?>">Edit</button>
				</form>
			</td>
			<td>
				<form  action="P-delCart.php" method="post">
					<button type="submit" name="id" value="<?php echo $index; ?>">Delete</button>
				</form>
			</td>
  		</tr>
		<?php 		}
				} 
			}
		}
		?>
	</table>
	
	
	
	<form action="P-submitCart.php" method="post"><input type="submit" value="Confirm"></form><br>
	<a href="F-cart.php">Back</a> <br><br>
</body>
</html>
<?php  $conn->close(); } ?>


