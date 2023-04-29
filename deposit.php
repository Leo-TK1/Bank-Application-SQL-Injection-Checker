<?php
    require "dbconfig.php";

    // Start the session
    session_start();

    // Check if the user is logged in
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    // Check if the form has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Get the inputted amount
        $amount = $_POST["amount"];

        // Add the amount to the balance in the database
        $username = $_SESSION["username"];
        $query = "UPDATE user SET balance = balance + $amount WHERE username = '$username'";
        $query_run = mysqli_query($conn, $query);

        // Display success message
        if($query_run){
            echo "<p>Funds deposited successfully.</p>";
        } else {
            echo "<p>Error depositing amount.</p>";
        }
    }

    // Get the balance for the current user
    $username = $_SESSION["username"];
    //SQL VULNERABLE TO BOOLEAN-BASED, TIME-BASED, UNION-BASED, AND OUT OF BOUND INJECTIONS
    //NO PREPARED SQL STATEMENTS
    $query = "SELECT balance FROM user WHERE username = '$username'";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);
    $balance = $row["balance"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Funds</title>
</head>
<body>

    <h1>Deposit Funds</h1>

    <p>Current balance: <?php echo $balance; ?></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="amount">Amount to deposit:</label>
        <input type="number" name="amount" id="amount" required>
        <br><br>
        <input type="submit" value="Deposit">
    </form>
    <button onclick="location.href='index.php'">Return to Home</button>

    <?php if($balance < 0): ?>
        <p>Warning: Your balance is negative.</p>
    <?php endif; ?>

</body>
</html>
