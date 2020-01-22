<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Product</title>
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
	<h1>Add Product</h1>
	<form action="P-addProduct.php" method="post">
		Product Name : <input type="text" name="name"> <br>
		Quantity : <input type="text" name="amount"> <br>
		<input type="submit" value="OK"><br>
		<a href="F-cart.php">Back</a> <br><br>
	</form>
</body>
</html>
<?php } ?>