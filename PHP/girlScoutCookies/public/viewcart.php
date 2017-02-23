<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
require "../application/cart.php";
session_start(); 
print_r($_SESSION);
echo "<br>after starting a session in viewcart...";
?>

<!DOCTYPE html>

<?php 

// If this session is just beginning, store an empty ShoppingCart in it.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new ShoppingCart();
}
?>

<html lang="en">

<head>
<title>Girl Scout Cookie Shopping Cart</title>
</head>

<body>

<h2>Girl Scout Cookie Shopping Cart</h2>

<p><?php
// Poor man's display of shopping cart
$_SESSION['cart']->display();
?></p>

<p><a href="index4.php">Resume shopping</a></p>

<p><a href="checkout.php">Check out</a></p>

</body>
</html>