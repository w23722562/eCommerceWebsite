<?php

require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt ->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: display.php?message=Record deleted successfully");
        exit(); 
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt -> close();
} else {
    echo "No ID specified for deletion.";
}

mysqli_close($conn)
?>