<?php 
  $dsn = "mysql:host=localhost;dbname=contact_book";
  $username = "jin";
  $password = "1234qwer";

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
  }