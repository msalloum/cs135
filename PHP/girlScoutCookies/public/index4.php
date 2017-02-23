<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
require "../application/cart.php";
session_start();
print_r($_SESSION);
echo "<br>after starting a session in index4. . .";
?>

<!DOCTYPE html>

<?php 
// If this session is just beginning, store an empty ShoppingCart in it.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new ShoppingCart();
}

// Figure out whether this page was loaded directly or via a post.  If via
// a post, diagnose any parameter problems.  If no problems, update the
// shopping cart.  The $message is displayed below at the end of the page.

$variety = trim($_POST["variety"]);
$quantity = trim($_POST["quantity"]);

if ($_POST["variety"]) {
    $displayName = ShoppingCart::$cookieTypes[$variety];
    if ($displayName && is_numeric($quantity) && $quantity > 0) {
        $_SESSION['cart']->order($variety, $quantity);
        $message = "$quantity boxes of $displayName added to shopping cart";
    }
    else if (!$displayName) {
        $message = "You made an invalid cookie selection";
    }
    else if (!is_numeric($quantity)) {
        $message = "The quantity you entered was not a number";
    }
    else if ($quantity < 1) {
        $message = "You entered an invalid quantity";
    }
}

?>

<html lang="en">

<head>
<title>Girl Scout Cookie Order Form 4</title>

<script language="javascript">

// Display the image corresponding to the cookie that is selected.
function updateImage () {
    var menu = document.getElementById("variety");
    var cookieImage = document.getElementById("cookieImage");
    cookieImage.src = 
        'cookies/' + menu.options[menu.options.selectedIndex].value + '.jpg';
}


// Determine which selection should appear in the menu and which variety should
// be displayed.
function setDefaultVarietyAndQuantity () {
    // Deal with cookie varieties.  If one was posted, use it.  Otherwise, use
    // whatever default the browser gives us.
    var defaultVariety = "<?php echo $variety ?>";
    var option = document.getElementById(defaultVariety);
    if (option) {
        document.getElementById("variety").selectedIndex = option.index;
    }

    // Deal with cookie quantities. If one was posted, use it. Otherwise, use 1.
    var quantity = "<?php echo $quantity ?>";
    if (quantity.length == 0) quantity = "1";
    document.getElementById("quantity").value = quantity;
}

// Clear the error/update message.
function clearMessage () {
    document.getElementById("message").innerHTML = "";
}
</script>
</head>


<!-- Every time this page loads, set the initial state of the form and
     update the image to match. -->
<body onload="setDefaultVarietyAndQuantity(); updateImage();">

<h2>Girl Scout Cookie Order Form 4</h2>

<p>Please use the form below to add boxes of cookies to your shopping cart.
Thank you!</p>

<form method="post">
<table>
  <tr><td>Variety</td><td>Quantity</td></tr>

  <tr><td><!-- Any time the selection changes, update the image and clear the message. -->
          <select id="variety" name="variety" onchange="updateImage(); clearMessage();">
<?php 
            // We generate the options using information from the ShoppingCart class.
            foreach (ShoppingCart::$cookieTypes as $key => $displayName) {
                echo "<option id=\"$key\" value=\"$key\">$displayName</option>";
            }
?>
          </select></td>

      <td><!-- Any time the quantity changes, clear the message -->
          <input type="text" id="quantity" name="quantity" onChange="clearMessage();"/></td>

      <td><input type="submit" value="Add to Cart"/></td>
  </tr>
</table>

<!-- This is where updated cookie images are placed. -->
<img id="cookieImage"/><br>

<!-- This is where messages are displayed. -->
<span style="color:red" id="message"><?php echo "$message" ?></span>

<p><a href="viewcart.php">View your shopping cart</a></p>
</form>

<p><b>Note:</b> Say you are using Firefox. Open another tab on your browser and see if a session is shared by both tabs within the same browser.  Open another instance of the same browser, i.e., Firefox in this case, and see if the session is shared by both instances.  Now, try a different browser, say Chrome, and see if Chrome and Firefox are sharing the same session.</p>

</body>
</html>