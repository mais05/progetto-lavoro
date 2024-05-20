<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
define("PAGE_TITLE", "Registrazione");
define("NAVIGATION_PAGE", "");

require_once "../../includes/utils/session.php";
require_once "../../includes/utils/database/users.php";

$first_name_error = $last_name_error = $username_error = $email_error = $password_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica che tutti i campi siano stati compilati correttamente
    if (empty($_POST['first_name'])) {
        $first_name_error = "Il nome è obbligatorio";
    }
    if (empty($_POST['last_name'])) {
        $last_name_error = "Il cognome è obbligatorio";
    }
    if (empty($_POST['username'])) {
        $username_error = "L'username è obbligatorio";
    }
    if (empty($_POST['email'])) {
        $email_error = "L'email è obbligatoria";
    }
    if (empty($_POST['password'])) {
        $password_error = "La password è obbligatoria";
    }

    // Se non ci sono errori nei campi, procedi con la registrazione
    if (empty($first_name_error) && empty($last_name_error) && empty($username_error) && empty($email_error) && empty($password_error)) {
        // Recupera i valori inviati dal modulo di registrazione
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Assumi che l'utente non sia un amministratore (passaggio 6 non specificato nella richiesta)
        $is_admin = false;

        // Aggiungi l'utente
        add_user($first_name, $last_name, $username, $email, $password, $is_admin);

        // Reindirizza dopo la registrazione
        header("Location: /progetto-lavoro/pages/login/");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php include "../../includes/components/structure/head.php";?>
</head>

<body class="bg-gray-900">

    <main id="swup" class="bg-base-200">

        <?php include "../../includes/components/structure/navigations/main/top.php";?>

        <div class="transition-slide-down">
            <div class="container mx-auto px-4 py-6">
                <h1 class="text-4xl font-bold text-gray-200 mb-6">
                    Registrazione
                </h1>

                <div class="flex flex-wrap justify-center">
                    <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                        <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                                    Nome
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" name="first_name" type="text" placeholder="Nome" autofocus />
                                <p class="text-red-500 text-xs italic"><?=$first_name_error;?></p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                                    Cognome
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" name="last_name" type="text" placeholder="Cognome" />
                                <p class="text-red-500 text-xs italic"><?=$last_name_error;?></p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" />
                                <p class="text-red-500 text-xs italic"><?=$username_error;?></p>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" />
                                <p class="text-red-500 text-xs italic"><?=$email_error;?></p>
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Password
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password" />
                                <p class="text-red-500 text-xs italic"><?=$password_error;?></p>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="submitBtn">
                                    Registrati
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../includes/components/structure/navigations/main/bottom.php";?>
        
    </main>

</body>

</html>
