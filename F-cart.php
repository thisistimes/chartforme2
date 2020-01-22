<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { 

include("connect.php");
$sql = "SELECT * FROM stock";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
</head>
	<style>
		
		body{
			text-align: center;
			background : #F8F8FF;
		}
		
		input{
			margin-bottom: 3%;
		}
		
		table, td, th{

			border: 1px solid black;
			
		}
	</style>
<body>


	<h2>List</h2> 
	<!-- เมนูรายการ -->
	<table align="center">
		<tr>
			<th>
				<form action="F-reportMember.php" method="post">
					<input type="submit" value="Member">
				</form>
			</th>
			<th>
				<form action="F-cartMe.php" method="post">
					<input type="submit" value="Cart">
				</form>
			</th>
			<th>
				<form action="F-addProduct.php" method="post" >
					<input type="submit" value="Add">
				</form>
			</th>
		</tr>
	</table><br>
	
	<!-- ตารางสินค้าและค้นหา -->
	
	Search : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Product Name" title="Type in a name">
	<table align="center" id="myTable">
  		<tr class="header">
			<th>Product ID</th>
    		<th>Name</th>
    		<th>Quantity</th>
			<th colspan="3">Selected</th>
  		</tr> 
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
  		<tr>
			<td><?php echo $row["id"]; ?></td>
    		<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["amount"]; ?></td>
			<td>
				<form action="F-editProduct.php" method="post" >
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">Edit</button>
				</form>
			</td>
			<td>
				<form action="P-delProduct.php" method="post" >
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">Delete</button>
				</form>
			</td>
			<td>
				<form action="P-addToCart.php" method="post">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">Order</button>
				</form>
				
			</td>	
  		</tr>
		
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
	
	<!-- Logout -->
	<p><form action="P-logout.php" method="post"><input type="submit" value="Logout"></form>
	<!-- Refresh -->
	<a href="F-cart.php">Refresh</a> <br><br>

	<script>
		function myFunction() {
  			var input, filter, table, tr, td, i, txtValue;
  			input = document.getElementById("myInput");
  			filter = input.value.toUpperCase();
  			table = document.getElementById("myTable");
  			tr = table.getElementsByTagName("tr");
  			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
    			if (td) {
      				txtValue = td.textContent || td.innerText;
      				if (txtValue.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
      				} else {
        				tr[i].style.display = "none";
      				}
    			}       
  			}
		}
	</script>
	
</body>
</html>
<?php $conn->close(); } ?>