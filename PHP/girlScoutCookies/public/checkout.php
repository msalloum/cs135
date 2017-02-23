<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
require "../application/cart.php";
session_start(); 
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
<title>Checkout</title>
</head>

<body>

<h2>Checkout</h2>

<p>Here is your order: <?php
// Poor man's display of shopping cart
$_SESSION['cart']->display();
session_unset();  // remove all session variables
session_destroy();
?></p>

<p>Your credit card will be billed.  Thanks for the order!</p>

<p><a href="index4.php">Shop some more!</a></p>

</body>
</html>