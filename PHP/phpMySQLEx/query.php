<!--
The process of using MySQL with PHP is as follows:
1. Connect to MySQL and select the database to use
2. Build a query string
3. Perform the query
4. Retrieve the results and output them to a web page
5. Repeat steps 2 to 4 until all desired data has been retrieved
6. Disconnect from MySQL
-->

<?php    // query.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query  = "SELECT * FROM Book";
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    echo 'Author: '   . $result->fetch_assoc()['author']   . '<br>';
    $result->data_seek($j);
    echo 'Title: '    . $result->fetch_assoc()['title']    . '<br>';
    $result->data_seek($j);
    echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
    $result->data_seek($j);
    echo 'Year: '     . $result->fetch_assoc()['year']     . '<br>';
    $result->data_seek($j);
    echo 'ISBN: '     . $result->fetch_assoc()['isbn']   . '<br><br>';
  }

  $result->close();
  $conn->close();
?>
