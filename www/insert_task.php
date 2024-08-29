<?php


$title = $_POST['title'];
$status = 'in behandeling';

require 'database.php';

$stmt = $conn->prepare("INSERT INTO tasks (title, status) VALUES (:title, :status)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':status', $status);
$stmt->execute();

header('Location: index.php');