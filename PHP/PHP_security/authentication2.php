<?php  // authentication2.php

  $username = 'admin';
  $password = 'letmein';

  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    if ($_SERVER['PHP_AUTH_USER'] == $username &&
        $_SERVER['PHP_AUTH_PW']   == $password) {
      echo "You are now logged in";
    }
    else {
      // Note the wording here: "Invalid username / password combination".
      // It doesn't say whether the username of the password or both were
      // wrong - the less info you can give to a potential hacker, the better!
      die("Invalid username / password combination");
    }
  }
  else {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }
?>
