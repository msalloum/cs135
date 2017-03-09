<?php
  session_start();

  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $forename = $_SESSION['forename'];
      $surname  = $_SESSION['surname'];

      // Because of this call, if you click your browser's reload button,
      // the session is destroyed and you will be prompted to return to
      // the login page.
      destroy_session_and_data();
	
      echo "Welcome back $forename.<br>
          Your full name is $forename $surname.<br>
          Your username is '$username'
          and your password is '$password'.";
  }
  else {
      echo "Please <a href='authentication4.php'>click here</a> to log in.";
  }
  
  function destroy_session_and_data() {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }

?>
