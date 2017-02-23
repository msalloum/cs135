<!DOCTYPE html>
<html lang="en">

<head>
<title>Girl Scout Cookie Order Form 2</title>

<script language="javascript">
// Display the image corresponding to the cookie that is selected.
function updateImage () {
    var menu = document.getElementById("variety");
    var cookieImage = document.getElementById("cookieImage");
    cookieImage.src = 
        'cookies/' + menu.options[menu.options.selectedIndex].value + '.jpg';
}

</script>
</head>

<!-- Every time this page loads, update the image to match the selection. -->
<body onload="updateImage();">

<h2>Girl Scout Cookie Order Form 2</h2>

<p>Please use the form below to add boxes of cookies to your shopping cart.
Thank you!</p>

<form method="post">
<table>
  <tr><td>Variety</td><td>Quantity</td></tr>

  <tr><td>
          <!-- Any time the selection changes, update the image. -->
          <select id="variety" name="variety" onchange="updateImage();">
            <option value="thinmints">Thin Mints</option>
            <option value="samoas">Samoas</option>
            <option value="trefoils">Trefoils</option>
            <option value="lemoncreme" selected>Lemon Chalet Creme</option>
            <option value="dosidos">Do-Si-Dos</option>
            <option value="dulce">Dulce de Leche</option>
            <option value="thanks">Thank U Berry Munch</option>
            <option value="tagalongs">Tagalongs</option>
          </select></td>
      <td><input type="text" name="quantity"/></td>
      <td><input type="submit" value="Add to Cart"/></td>
  </tr>  
</table>

<!-- This is where updated cookie images are placed. -->
<img id="cookieImage"/>
</form>

</body>
</html>
