<!DOCTYPE html>
<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "dbconfig.php";

    // Start the session
    session_start();

    // Check if the user is already logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter your username.";
        } else{
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if(empty($username_err) && empty($password_err)){

            //SQL VULNERABLE TO BOOLEAN-BASED, TIME-BASED, UNION-BASED, AND OUT OF BOUND INJECTIONS
            //NO INPUT SANITIZATION, PREPARED SQL STATEMENTS, OR INPUT VALIDATION
            //LINE 46 IS THE MOST VULNERABLE LINE OF CODE
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run)>0){
                $row = mysqli_fetch_assoc($query_run);
                $user_id = $row["uid"];
                $update_sql = "UPDATE user SET loggedIn=1 WHERE uid='$user_id'";
                $query_run = mysqli_query($conn, $update_sql) or die(mysqli_error($conn));
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("location: login_successful.php");
            }
            else {
                echo "<script>alert('Invalid username or password.');</script>";
            }
        }
    }
?>


<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login Page</h1>
	<form method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Log In">
	</form>
</body>
</html>
