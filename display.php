<!-- page to display whole database -->

<?php
require 'db_connect.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$query = "SELECT * FROM products WHERE name LIKE '%$search%'";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <img onclick="productlisting()" id="headerIcon" src="assets/headerIcon.png"></img>
    </header>
    <nav>
        <button id = "back-button" onclick="backToStart()">Back</button> <br><br>
        <button id = "add_product" onclick="add_product()">Add Product</button>
    </nav>
    
        <form id="admin-search" action="display.php" method="GET">
            <h1>Product List</h1>
            <input type="text" name="search" placeholder="Search by name or age"></input>
            <button type="submit">Search</button>
        </form>

        <table id="display-table" border="1" >
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <?php while ($row= mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['price']); ?></td>
            <td><?php echo htmlspecialchars($row['stock']); ?></td>
            <td> <a href='edit_product.php?id=<?php echo $row['id'];?>'> <img src="assets/edit.png" id="selection-icon"></img> </a> </td>
            <td> <a href='delete_product.php?id=<?php echo $row['id'];?>'> <img src="assets/bin.png" id="selection-icon"></img> </a> </td>
        </tr>

        <?php endwhile; ?>
        </table>
</body>
</html>

