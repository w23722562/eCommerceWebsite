<!-- automatic connection to database when page loads -->

<?php
    //database connection
    $servername = "localhost";
    $username = "root"; //default XAMPP username 
    $password = ""; //leave empty for XAMPP default
    $dbname = "ecommerce";

    //create connection
    $conn =  new mysqli($servername, $username, $password, $dbname);

    
    //check connection
    if ($conn -> connect_error) {
        die("connection failed: " .$conn->connect_error);
    } else {
        echo "<p id= 'indicator'>Status: database connected</p>";
    }


?>
