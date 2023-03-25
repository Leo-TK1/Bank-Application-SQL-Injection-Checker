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
            <form action="post_account_creation.php" method="POST">
                  <div class="new-account-form-body">
                    <div class="new-account-form-control">
                      <label class="required" for="username">Create a new username: </label>
                      <input type="text" name="username" id="username" required>
                    </div>
                    <div class="new-account-form-control">
                      <label class="required" for="password">Create a new password: </label>
                      <input type="text" name="password" id="password" required>
                    </div>  
                    <div class="new-account-form-control">
                      <label class="required" for="confirmPassword">Confirm your new password: </label>
                      <input type="text" name="confirmPassword" id="confirmPassword" required>
                    </div> 
                    <button>
                          <span>Create account</span>
                    </button>   
                  </div>     
              </form>
          </div>    
      </div> 
</body>