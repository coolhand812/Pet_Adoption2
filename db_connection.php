<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pet_adoption2";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "<b>Connection to MySQL DB established!</b> <br>";
?>