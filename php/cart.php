<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Shopping Cart</title>
</head>
<body>
    
<?php
// Starting session to manage cart items
session_start();

// Dummy data for products (in a real application, this data would come from a database)
$products = [
    1 => ["name" => "book1", "price" => 200, "description" => "A great book about PHP.", "image" => "../images/img1.jpg"],
    2 => ["name" => "book2", "price" => 150, "description" => "An excellent resource for learning HTML and CSS.", "image" => "../images/img2.jpg"],
];

// Initialize cart session if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $productId => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$productId]);
            } else {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }
        }
    }
}
?>

<h2>Shopping Cart</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $productId => $product) {
                $subtotal = $product['price'] * $product['quantity'];
                $total += $subtotal;
            ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($products[$productId]['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" width="50" height="50"></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td>
                    <input type="number" name="quantities[<?php echo $productId; ?>]" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="0">
                </td>
                <td><?php echo htmlspecialchars($subtotal); ?></td>
                <td>
                    <button type="submit" name="update_cart" value="Update Cart">Update Cart</button>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th colspan="5">Total</th>
                <td><?php echo htmlspecialchars($total); ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <button type="submit" name="update_cart">Update Cart</button>
    <a href="checkout.php">Proceed to Checkout</a>
</form>

</body>
</html>
