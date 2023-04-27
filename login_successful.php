<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    
    <!-- CSS -->
    <!link rel="stylesheet" href="style.css">

    <!-- Montesarat Font -->
    <!link rel="preconnect" href="https://fonts.googleapis.com">
    <!link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Login Success!</h1>
                <?php
                    echo "<script>alert('Login success!');</script>";
                ?>
                <form action="index.php" method="POST">
                    <input name="returnHomeButton" type="submit" id="returnHomeButton" value="Return to Home">
                </form>
<body>