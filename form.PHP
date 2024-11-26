<!-- form to add new student -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <header>
        <img id="headerIcon" src="assets/headerIcon.png"></img>
    </header>

    <nav>
        <button id = "back-button" onclick="ToDBView()">Back</button>
    </nav>
    <form id="form-input" name="studentForm" action="form.php" method="post">
        <label for="name">Name:</label> <br>
        <input name="name" type="text" placeholder="Enter Name" required></input> <br>

        <label for="price">Price:</label> <br>
        <input name="price" type="text" placeholder="Enter Price" required></input> <br>
        
        <label for="stock">Stock:</label> <br>
        <input name="stock" type="number" placeholder="Enter Stock" required></input> <br> <br>

        <button type="submit">Submit ✔</button> <br>
    </form> 

    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</body>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require 'db_connect.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = round($_POST['price'], 2);
    $stock = (int)$_POST['stock'];

    $stmt = $conn->prepare("INSERT INTO products (name,  price, stock) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $price, $stock);

    if ($stmt->execute()) {
        echo "<p id= 'alert'>New student added successfully</p>";
    } else {
        echo "error";
    }


    $stmt->close();
    $conn->close();
}
?>


</html>

