<?php 
$productID = $_GET['product_id'];
$productName = "";
$productDesc = "";
$productImg = "";
$productPrice = "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="../css/product.css">
    

</head>
<body>
    <div class="product-page">
        <div class="product-image">
            <img src="product.jpg<?php echo $productImg?>" alt="Product Image">
        </div>
        <div class="product-details">
            <h2 class="product-name">Product Name<?php echo $productName ?></h2>
            <h4 class="product-description">This is a great product that you will love. It has many features and benefits that will make your life easier.<?php echo $productDesc?></h4>
            <p class="product-price">$49.99 <?php echo $productPrice?></p>
            <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
        </div>
    </div>
    <script src="../js/profile.js"></script>
</body>
</html>
