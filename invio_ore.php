<?php
session_start();

// Verifica se l'utente ha eseguito l'accesso
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}

//query per recuperare l'id dell'utente
$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['id'];

$sql = "INSERT INTO time (user_id, date, time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $cognome, $email]);