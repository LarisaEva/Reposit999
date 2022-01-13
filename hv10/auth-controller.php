<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/check-users.php';

if (check_auth_users()) {
    header('Location: login.php');
} else {
    set_error_message('Ошибка аутентификации!');
    header('Location: login.php');
}