<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
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
	<h1>Register</h1>
	<form action="P-register.php" method="post">
		Email : <input type="text" name="user"> <br>
		Password : <input type="password" name="pass"> <br>
		<input type="submit" value="Register">
		<p><a href="F-login.php" class="btn btn-primary">Back</a></p>
	</form>
</body>
</html>