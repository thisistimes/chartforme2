<?php session_start();
if (!$_SESSION["email"]){
	header("location:F-login.php"); 
}else { 

include("connect.php");
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Member</title>
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
	<h2>Member List</h2>
	<table align="center">
		<tr>
			<th>  Name  </th>
			<th>  Password  </th>
			<th>  Del.  </th>
			
		</tr>
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
		<tr>
    		<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
			<td>
				<form action="P-delMember.php" method="post">
					<button type="submit" value="<?php echo $row["email"]; ?>" name="user">Delete</button>
				</form>
			</td>
			
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
	<p><a href="F-cart.php" class="btn btn-primary">Back</a></p>
</body>
</html>
<?php $conn->close(); } ?>
