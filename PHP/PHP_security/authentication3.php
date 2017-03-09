<?php // authentication3.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $untemp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
    $pwtemp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);

    $query  = "SELECT * FROM users WHERE username='$untemp'";
    $result = $conn->query($query);
    if (!$result) {
        die($conn->error);
    }
    elseif ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_NUM);
	$result->close();

        $salt = "qm&h*";
        $pepper = "pg!@";
        $token = hash('ripemd128', "$salt$pwtemp$pepper");

        if ($token == $row[3]) {
            echo "$row[0] $row[1]: Hi $row[0], you are now logged in as '$row[2]'";
        }
        else {
            die("Invalid username/password combination");
        }
    }
    else {
        die("Invalid username/password combination");
    }
  }
  else {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  $conn->close();

  function mysql_entities_fix_string($conn, $string) {
    return htmlentities(mysql_fix_string($conn, $string));
  }	

  function mysql_fix_string($conn, $string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $conn->real_escape_string($string);
  }
?>
