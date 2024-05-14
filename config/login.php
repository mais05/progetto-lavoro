<?php
require_once 'dbConnection.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE (email = :email OR username = :email) AND password = :password";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['id'] = $user['id'];
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
