<?php
require_once 'dbConnection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = :email AND password = :password";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    header("Location: /progetto-lavoro/pages/home.php");
    exit();
} else {
    header("Location: /progetto-lavoro/pages/login.php");
    exit();
}
