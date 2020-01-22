<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
	<style>

		body{
			text-align: center;
			background : #F8F8FF;
		}
		input {
			margin-bottom: 2%
		}
	</style>
<body>
	<h1>Login</h1>
	<form action="P-login.php" method="post">
		Email : <input type="text" name="user"> <br>
		Password : <input type="password" name="pass"> <br>
		<input type="submit" value="Login">
	</form>
	<a href="F-register.php">Register</a>
</body>
</html>