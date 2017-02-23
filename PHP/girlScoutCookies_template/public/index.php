<!DOCTYPE html>
<html lang="en">

<head>
<title>Girl Scout Cookie Order Form 1</title>
</head>

<body>

<h2>Girl Scout Cookie Order Form 1</h2>

<p>Please use the form below to add boxes of cookies to your shopping cart.
Thank you!</p>

<form method="post">
<table>
  <tr><td>Variety</td><td>Quantity</td></tr>

  <tr><td><select name="variety">
            <option value="thinmints" selected>Thin Mints</option>
            <option value="samoas">Samoas</option>
            <option value="trefoils">Trefoils</option>
            <option value="lemoncreme">Lemon Chalet Creme</option>
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
<img src="cookies/thinmints.jpg"/>
</form>

</body>
</html>
