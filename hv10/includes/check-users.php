<?php

require_once __DIR__ . '/database-interface-simulator.php';

function check_reg_users() :bool {
	$users = database_get_users();

	$email = trim(htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES | ENT_HTML5));

	foreach ($users as $user) {
		if ($email === $user['email']) {
			return true;
		}
	}
	return false;
}

function check_auth_users() :bool {
	$email = trim(htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES | ENT_HTML5));
	$password = md5($_POST['password']);


	$users[1] = database_get_users();
	$users[2] = database_get_admins();
	for ($i = 1; $i <= 2; $i++) {
		foreach ($users[$i] as $user) {
			if ($email === $user['email'] && $password === $user['password']) {
				$_SESSION['is_auth'] = $i;
				$_SESSION['email'] = $email;
				return true;
			}
		}
	}
	return false;
}
?>