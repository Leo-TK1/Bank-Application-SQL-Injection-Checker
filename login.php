<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login Page</h1>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Check username and password against database or some other validation
			// If valid, redirect to homepage or some other page
			// If invalid, display error message
			if ($username == 'admin' && $password == 'password') {
				header('Location: homepage.php');
				exit();
			} else {
				echo "<p>Invalid username or password. Please try again.</p>";
			}
		}
	?>
	<form method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Log In">
	</form>
</body>
</html>
