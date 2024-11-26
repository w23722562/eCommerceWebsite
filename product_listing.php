<!-- page to display whole database -->

<?php
require 'db_connect_NO.php';

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
    <header id="browse-header">
        <img onclick="productlisting()" id="headerIcon" src="assets/headerIcon.png"></img>

        <nav style="display:flex;flex-direction:row;">
            <button id = "toAdminButton" onclick="backToStart()">Admin</button> <br><br>
        </nav>

        <div>
            <p id="basketTotal"> Total: £0 </p>
            <img onclick="openCart()" id="shopping-cart" src="assets/shopping-cart.png"></img>
            <span id="basket-number">0</span>
        </div>
    </header>
    
    <div id="open-basket">
    </div>

    <div id="sideBar">
        <div id="sideBar-contents">
            <h3 style="font-family: Arial, Helvetica, sans-serif;">Filter</h3>
            <form action="product_listing.php" method="GET">
                <input type="text" name="search" placeholder="Search by name or age"></input>
                <button type="submit">Search</button>
                <br><br>
                <button type="submit">Clear Filters</button>
            </form>
        </div>
    </div>


        <div class="productFrame">

            <?php while ($row= mysqli_fetch_assoc($result)): ?>

                <div class="productContainer">
                    <?php echo htmlspecialchars($row['name']); ?> <br>
                    <?php echo "£" , htmlspecialchars($row['price']); ?> <br> <br>
                    <?php echo "stock left: " , htmlspecialchars($row['stock']); ?> <br>

                    <button onclick="addItem('<?php echo htmlspecialchars($row['name']); ?>' , '<?php echo htmlspecialchars($row['price']); ?>')" id="buyButton">Add To Cart</button>
            
                </div>

            <?php endwhile; ?>
        </div>

</body>
</html>

