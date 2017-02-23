<?php 
require "../application/cart.php";
?>
<!DOCTYPE html>

<?php

$variety=trim($_POST["variety"]);
$quantity=trim($_POST["quantity"]);

if($variety) { // via post, so check user submited values

  $displayName = ShoppingCart::$cookieTypes[$variety];

  if($displayName && is_numeric($quantity) && $quantity >0 ) {
    $message = "$quantity boxes of $displayName added to shopping cart";
  }
  else if (!$displayName) {
    $message = "You made an invalide cookie selection";

  }
  else if (!is_numeric($quantity) ){
    $message = "Entered quantity is non-numeric";

  }else{ // less than zero
    $message = "Entered quantity is invalid";
  }
}

?>


<html lang="en">

<head>
<title>Girl Scout Cookie Order Form 1</title>

<script>
function updateImage() {
   var menu = document.getElementById("variety");
   var cookieImage = document.getElementById("cookieImg");

   cookieImage.src = "cookies/" + menu.options[menu.options.selectedIndex].value + ".jpg";
}

function setDefaultVarietyAndQuantity() {
  var defaultVariety = "<?php echo $variety ?>";
  var option = document.getElementById(defaultVariety);

  if (option) {
    document.getElementById("variety").selectedIndex = option.index;

  }

  var quantity = "<?php echo $quantity ?>";
  "<?php echo $quantity ?>";
  if (quantity.length == 0)  {
    quantity = "1";
  }
  document.getElementById("quantity").value = quantity;
}
function clearMessage() {
  document.getElementById("message").innerHTML = "";
}
</script>
</head>

<body onload="setDefaultVarietyAndQuantity(); updateImage();">

<h2>Girl Scout Cookie Order Form 1</h2>

<p>Please use the form below to add boxes of cookies to your shopping cart.
Thank you!</p>

<form method="post">
<table>
  <tr><td>Variety</td><td>Quantity</td></tr>

  <tr><td><select id="variety" name="variety" onchange="updateImage(); clearMessage();">
            
            <?php

            foreach (ShoppingCart::$cookieTypes as $key => $displayName) {
              echo "<option id=\"$key\" value =\"$key\"> $displayName</option>";
            }
            ?>
          </select></td>
      <td><input type="text" id="quantity" name="quantity"/></td>
      <td><input type="submit" value="Add to Cart"/></td>
  </tr>  
</table>

<!-- This is where updated cookie images are placed. -->
<img id="cookieImg">
<span style="color:blue" id="message"> <?php echo $message ?> </span>
</form>



</body>
</html>
