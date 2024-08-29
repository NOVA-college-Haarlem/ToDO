<?php


$title = $_POST['title'];
$status = 'in behandeling';

require 'database.php';

$stmt = $conn->prepare("INSERT INTO tasks (title, status) VALUES (:title, :status)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':status', $status);

if($stmt->execute()){

    //start sessie om melding te tonen
    session_start();
    $_SESSION['message'] = 'Taak is toegevoegd';
    $_SESSION['message_type'] = 'success';
}



header('Location: index.php');