<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
define("PAGE_TITLE", "Accedi");
define("NAVIGATION_PAGE", "");

require_once "../../includes/utils/session.php";
require_once "../../includes/utils/database/users.php";

$username_error = $password_error = "";

if(!USER_IS_LOGGED){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['username']) || empty($_POST['username'])) {
            $username_error = "L'username è obbligatorio";
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $password_error = "La password è obbligatoria";
        }

        if (empty($username_error) && empty($password_error)) {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $user = get_user_by_username_or_email($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: ../../");
                exit();
            } else {
                $password_error = "Nome utente o password errati";
            }
        }
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
                    Accedi
                </h1>

                <div class="flex flex-wrap justify-center">
                    <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                        <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Username o Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username" autofocus />
                                <p class="text-red-500 text-xs italic"><?=$username_error;?></p>
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
                                    ACCEDI
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

