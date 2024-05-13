<?php
session_start();

// Verifica se l'utente ha eseguito l'accesso
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
</head>
<body>
    <h2>Benvenuto <?php echo $username; ?></h2>
    <form action="invio_ore.php" method="post" onsubmit="return validateForm()">
        <p>Inserisci data e ora di inizio</p>
        <label for="date">Data:</label><br>
        <input type="date" id="date" name="date"><br>
        <label for="start_hour">Ora di inizio:</label><br>
        <input type="time" id="start_hour" name="start_hour"><br>
        <label for="end_hour">Ora di fine:</label><br>
        <input type="time" id="end_hour" name="end_hour"><br><br>
        <input type="submit"><br><br>
    </form>
    
    <form action="login.html">
        <input type="submit" value="Torna al Login">
    </form>

    <script>
        function validateForm() {
            var startHour = document.getElementById("start_hour").value;
            var endHour = document.getElementById("end_hour").value;

            if (endHour < startHour) {
                alert("L'ora di fine non può essere inferiore all'ora di inizio.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>