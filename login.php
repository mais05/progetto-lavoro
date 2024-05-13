<?php
session_start();

// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ore_lavoro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utente autenticato, reindirizza alla pagina di benvenuto
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id'];
        header("location: home.php");
    } else {
        echo "Credenziali non valide.";
    }
}

$conn->close();
?>
