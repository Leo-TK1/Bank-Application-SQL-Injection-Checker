<?php

    require "dbconfig.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO user (username) VALUES ('$username')";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

    $query = "UPDATE accounts SET password = '$password' WHERE username = '$username' ";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation Successful</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    
    <!-- CSS -->
    <!link rel="stylesheet" href="style.css">

    <!-- Montesarat Font -->
    <!link rel="preconnect" href="https://fonts.googleapis.com">
    <!link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
	<h1>Account Creation Successful</h1>
	<div class="account-creation-sucessful-container">
          <div class="account-creation-sucessful-form">
            <form action="index.php" method="POST">
                  <div class="account-creation-sucessful-body">
                    Your online bank account was successfully created!<br><br>
                    <button>
                          <span>Back to homepage</span>
                    </button>   
                  </div>     
              </form>
          </div>    
      </div> 
</body>