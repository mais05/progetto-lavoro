<?php
// Parametri di connessione al database
$host = 'localhost';
$dbname = 'ore_lavoro';
$username = 'root';
$password = '';

// Stringa di connessione PDO
$dsn = "mysql:host=$host;dbname=$dbname";

// Tentativo di connessione al database
try {
    $dbh = new PDO($dsn, $username, $password);
    echo "Connessione al database riuscita.";
} catch (PDOException $e) {
    // Gestione degli errori in caso di fallimento della connessione
    echo "Connessione al database fallita: " . $e->getMessage();
    die();
}