<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);

require_once "database_connection.php";

/**
 * Aggiunge un nuovo utente
 *
 * @param string $first_name Nome dell'utente
 * @param string $last_name Cognome dell'utente
 * @param string $username Nome utente
 * @param string $email Email dell'utente
 * @param string $password Password dell'utente (già hashata)
 * @param boolean $is_admin Indica se l'utente è admin o no
 */
function add_user($first_name, $last_name, $username, $email, $password, $is_admin) {
	$pdo = pdo_connection();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, user_name, email, password, is_admin) VALUES (:first_name, :last_name, :user_name, :email, :password, :is_admin)");
	$stmt->execute([
		'first_name' => $first_name, 
		'last_name' => $last_name, 
		'user_name' => $username,
		'email' => $email,
		'password' => $hashedPassword,
		'is_admin' => intval($is_admin),
	]);
}

/**
 * Modifica un utente
 *
 * @param string $user_id ID dell'utente
 * @param string $first_name Nome dell'utente
 * @param string $last_name Cognome dell'utente
 * @param string $email Email dell'utente
 */
function edit_user($user_id, $first_name, $last_name, $email) {
	$pdo = pdo_connection();

	$stmt = $pdo->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email WHERE user_id=:user_id");
	$stmt->execute([
		'first_name' => $first_name, 
		'last_name' => $last_name, 
		'email' => $email, 
		'user_id' => $user_id,
	]);
}

/**
 * Aggiorna lo stato di un utente
 * 
 * @param string $user_id ID dell'utente
 * 
 * @return void
 */
function update_user_status($user_id) {
	$pdo = pdo_connection();

	$stmt = $pdo->prepare("UPDATE users SET last_active=CURRENT_TIMESTAMP WHERE user_id=:user_id");
	$stmt->execute(['user_id' => $user_id]);
}

/**
 * Ottiene le informazioni di un utente dato il suo user_id
 *
 * @param string $user_id ID dell'utente
 *
 * @param array Risultato della query
 */
function get_user_by_id($user_id) {
	$pdo = pdo_connection();

	$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(['user_id' => $user_id]);
	return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Ottiene le informazioni di un utente dato il suo nome utente o email
 *
 * @param string $username Il nome utente o email dell'utente
 *
 * @return array|false Restituisce un array associativo con le informazioni dell'utente se trovato, altrimenti false
 */
function get_user_by_username_or_email($username) {
    $pdo = pdo_connection(); // Assicurati di avere una connessione al database

    $query = "SELECT * FROM users WHERE email = :email OR user_name = :username LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $username);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


/**
 * Controlla se un utente esiste dato il suo user_id
 *
 * @param string $user_id ID dell'utente
 *
 * @return boolean True se l'utente esiste, false se l'utent non esiste
 */
function user_exists_by_id($user_id) {
	return !empty(get_user_by_id($user_id));
}
