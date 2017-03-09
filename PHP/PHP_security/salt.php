<?php // Set up uses with salt.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die($conn->connect_error);

  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  )";
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $salt    = "qm&h*";
  $pepper  = "pg!@";

  $forename = 'Joe';
  $surname  = 'Doe';
  $username = 'jdoe';
  $password = 'doesecret';
  $token    = hash('ripemd128', "$salt$password$pepper");

  add_user($conn, $forename, $surname, $username, $token);

  $forename = 'Amy';
  $surname  = 'Jones';
  $username = 'ajones';
  $password = 'amysecret';
  $token    = hash('ripemd128', "$salt$password$pepper");

  add_user($conn, $forename, $surname, $username, $token);

  function add_user($conn, $fn, $sn, $un, $pw) {
    $query  = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
  }
?>
