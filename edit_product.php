<!-- page to edit rows already in database -->

<?php
require 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM products");

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id= $id");
    $product = mysqli_fetch_assoc($result);
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $price = round($_POST["price"],2);
    $stock = (int)$_POST['stock'];

    $stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?");
    $stmt -> bind_param("ssii", $name, $price , $stock, $id);

    if ($stmt -> execute()) {
        echo "Student record upafed successfully";
        header("Location: display.php");
        exit();
    } else {
        echo "Error" . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <img onclick="productlisting()" id="headerIcon" src="assets/headerIcon.png"></img>
    </header>
    <nav>
        <button id = "back-button" onclick="backToDisplay()">Back</button>
    </nav>
    <form id="edit-form" action="edit_product.php?id=<?php echo $product['id']; ?>" method="post">
        <label for="name">Name:</label> <br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required> <br>

        <label for="price">Price:</label> <br>
        <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required> <br>

        <label for="stock">Stock:</label> <br>
        <input type="number" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required> <br>

 
        <button id="update-button" type="submit">Update</button>
    </form>
</body>
</html>

