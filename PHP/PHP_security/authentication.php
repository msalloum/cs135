<?php  // authentication.php

  // Basic authentication is not recommended on a production website, as
  // it is very insecure, but you need to know how it works for maintaining
  // legacy code.

  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    echo "Welcome User: " . $_SERVER['PHP_AUTH_USER'] .
         " Password: "    . $_SERVER['PHP_AUTH_PW'];
  }
  else {
    // If the user fills out the fields, the PHP program runs again from the top.
    // But if the user clicks on Cancel, the program proceeds to the following
    // two lines, which send a header ('HTTP/1.0 401 Unauthorized') and an error
    // message.
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die("Please enter your username and password");
  }

  // Note: Once a user has been authenticated, you will not be able to get
  // the authentication dialog to pop up again unless the user closes and
  // reopens all browser windows, as the web browser will keep returning
  // the same username and password to PHP.
?>
