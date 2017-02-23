<?php 
// Include the ShoppingCart class.
require "../application/cart.php";
?>

<!DOCTYPE html>

<?php 

// Figure out whether this page was loaded directly or via a post.  If via
// a post, diagnose any parameter problems.  The $message is displayed below
// at the end of the page.

$variety = trim($_POST["variety"]);
$quantity = trim($_POST["quantity"]);

if ($variety) {
    $displayName = ShoppingCart::$cookieTypes[$variety];
    if ($displayName && is_numeric($quantity) && $quantity > 0) {
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
<title>Girl Scout Cookie Order Form 3</title>

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

<h2>Girl Scout Cookie Order Form 3</h2>

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
<span style="color:red" id="message"><?php echo $message ?></span>
</form>

</body>
</html>