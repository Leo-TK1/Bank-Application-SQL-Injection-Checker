<?php

    $hostname = "localhost";
    $user = "root";
    $pass = "";
    $database = "accounts";

    $conn = new mysqli($hostname, $user, $pass, $database) or die(mysqli_error("Could not connect to Database"));

?>