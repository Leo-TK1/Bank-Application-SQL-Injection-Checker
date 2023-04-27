<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Banking Home</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    
    <!-- CSS -->
    <!link rel="stylesheet" href="style.css">

    <!-- Montesarat Font -->
    <!link rel="preconnect" href="https://fonts.googleapis.com">
    <!link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
	<h1>Welcome to our Bank</h1>
	<div>
		<button onclick="location.href='create_account.php'">Create Account</button>
		<button onclick="location.href='login.php'">Log In</button>
        <?php
            session_start();

            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                // The user is logged in, so show the logout button
                echo '<form action="" method="post">';
                echo '<input type="submit" name="logout" value="Logout">';
                echo '</form>';

                // The user is logged in, so show the account button
                echo '<form action="" method="post">';
                echo '<input type="submit" name="goToAccountHome" value="Go To Account">';
                echo '</form>';

                // Check if the logout button was clicked
                if(isset($_POST["logout"])){
                    // Set loggedin to false and username to an empty string
                    $_SESSION["loggedin"] = false;
                    $_SESSION["username"] = "";
                    
                    // Redirect the user to the login page
                    header("location: logout_successful.php");
                }

                // Check if the logout button was clicked
                if(isset($_POST["goToAccountHome"])){
                    // Redirect the user to the login page
                    header("location: account_home.php");
                }
            }
        ?>
	</div>
</body>