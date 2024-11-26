<!-- automatic connection to database when page loads -->

<?php
    //database connection
    $servername = "localhost";
    $username = "root"; //default XAMPP username 
    $password = ""; //leave empty for XAMPP default
    $dbname = "ecommerce";

    //create connection
    $conn =  new mysqli($servername, $username, $password, $dbname);


?>
