<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);

require_once "database/users.php";

session_name("session_id");
session_start();
setlocale(LC_ALL, "it_IT.UTF-8");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

	if (user_exists_by_id($user_id)) {
		
		$user = get_user_by_id($user_id)[0];

		define("USER_IS_LOGGED", true);
		define("USER", $user);
	}else {
		define("USER_IS_LOGGED", false);
	}

} else {
	define("USER_IS_LOGGED", false);
}

if(!USER_IS_LOGGED && defined("LOGIN_REQUIRED") && LOGIN_REQUIRED) {
	header("Location: /progetto-lavoro/");
	exit;
}