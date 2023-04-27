<?php
// Start the session
session_start();

// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    // Get the username from the session variable
    $username = $_SESSION["username"];

    // Make a database connection
    require_once "dbconfig.php";

    // Prepare a select statement

    //SQL VULNERABLE TO BOOLEAN-BASED, TIME-BASED, UNION-BASED, AND OUT OF BOUND INJECTIONS
    //NO PREPARED SQL STATEMENTS
    $query = "SELECT balance FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if(mysqli_num_rows($result) > 0){

        // Fetch the balance from the result
        $row = mysqli_fetch_assoc($result);
        $balance = $row["balance"];

        // Display the balance
        echo "Your balance is: " . $balance;
        echo '<form action="" method="post">';
        echo '<input type="submit" name="returnHomeButton" value="Return To Home">';
        echo '</form>';

        // Check if the home button was clicked
        if(isset($_POST["returnHomeButton"])){
            // Redirect the user to the home page
                header("location: index.php");
        }

        // The user is logged in, so show the deposit button
        echo '<form action="" method="post">';
        echo '<input type="submit" name="depositFunds" value="Deposit Funds">';
        echo '</form>';

        // Check if the logout button was clicked
        if(isset($_POST["depositFunds"])){
            // Redirect the user to the login page
            header("location: deposit.php");
        }

         // The user is logged in, so show the deposit button
         echo '<form action="" method="post">';
         echo '<input type="submit" name="withdrawFunds" value="Withdraw Funds">';
         echo '</form>';
 
         // Check if the logout button was clicked
         if(isset($_POST["withdrawFunds"])){
             // Redirect the user to the login page
             header("location: withdraw.php");
         }


    } else {
        echo "Error: Could not retrieve balance.";
    }

} else {
    echo "Error: You are not logged in.";
}
?>