<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css">

    <title>Check out</title>
</head>
<body>
    
<form action="#">
    <h2>Checkout</h2>
    <section>
        <h3>Order Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $cartProducts = [
            ["name" => "book1", "price" => 200, "quantity" => 2],
            ["name" => "book2", "price" => 150, "quantity" => 1]
            ];               
            $total = 0;
                foreach ($cartProducts as $product) {
                    $subtotal = $product['price'] * $product['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $subtotal; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <th colspan="3">Total</th>
                    <td><?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <section>
        <h3>Payment Information</h3>
        <label for="visa-card">Visa Card Number:</label>
        <input type="text" id="visa-card" name="visa-card" required>
        <label for="promo-code">Promo Code:</label>
        <input type="text" id="promo-code" name="promo-code">
    </section>
    <button type="submit">Place Order</button>
</form>
</body>
</html>