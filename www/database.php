<?php

$servername = "mariadb";
$username = "root";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=todo", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}