<?php   // prepared.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  // mysqli provides prepare method which allows ? as a placeholder.
  $stmt = $conn->prepare('INSERT INTO Book (author, title, category, year, price) VALUES(?,?,?,?,?)');

  // First argument to bind_param is a type string for each of the arguments
  // in turn.  Allowed types are 'i' for integer; 'd' for double;
  // 's' for string; and 'b' for BLOB.
  $stmt->bind_param('ssssd', $author, $title, $category, $year, $price);

  // With the variables bound to the prepared statement, we now populate
  // these variables with the data to be passed to MySQL:
  $author   = 'Emily Brontë';
  $title    = 'Wuthering Heights';
  $category = 'Classic Fiction';
  $year     = '1847';
  $price    = 23.56;

  // Now, PHP has everything it needs to execute the prepared statement.
  $stmt->execute();

  // To check if the command was executed successfully
  printf("%d Row inserted.\n", $stmt->affected_rows);

  $stmt->close();
  $conn->close();
?>
