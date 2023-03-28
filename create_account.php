<?php

require "dbconfig.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    
    <!-- CSS -->
    <!link rel="stylesheet" href="style.css">

    <!-- Montesarat Font -->
    <!link rel="preconnect" href="https://fonts.googleapis.com">
    <!link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
	<h1>Create a new account</h1>
	<div class="new-account-container">
          <div class="new-account-form">
            <form action="create_account.php" method="POST">
                  <div class="new-account-form-body">
                    <div class="new-account-form-control">
                      <label class="required" for="username">Create a new username: </label>
                      <input type="text" name="username" id="username" required>
                    </div><br>
                    <div class="new-account-form-control">
                      <label class="required" for="password">Create a new password: </label>
                      <input type="text" name="password" id="password" required>
                    </div><br>
                    <div class="new-account-form-control">
                      <label class="required" for="confirmPassword">Confirm your new password: </label>
                      <input type="text" name="confirmPassword" id="confirmPassword" required>
                    </div><br>
                    <div class="new-account-form-control">
                      <label class="required" for="balance">Enter your initial deposit: </label>
                      <input type="number" name="balance" id="balance" required>
                    </div><br>  
                    <input name="createAccountButton" type="submit" id="createAccountButton" value="Create Account">
                  </div>     
              </form>
              <?php
                  if(isset($_POST['createAccountButton'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['confirmPassword'];
                    $balance = $_POST['balance'];
                    
                    if($password == $cpassword){
                      $query = "SELECT * FROM user WHERE username='$username'";
                      $query_run = mysqli_query($conn, $query);
                      
                      if(mysqli_num_rows($query_run)>0){
                        echo "<script>alert('User already exists');</script>";
                      }
                      else{
                        $query = "INSERT INTO user VALUES('$username', '$password', '$balance')";
                        $query_run = mysqli_query($conn, $query);

                        if($query_run){
                          echo "<script>alert('Registration successful');</script>";
                        }
                        else{
                          echo "<script>alert('Registration failed');</script>";
                        }
                      }
                    }

                  }
              ?>
          </div>    
      </div> 
</body>






