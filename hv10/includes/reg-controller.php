<?php

session_start();

require_once __DIR__ . '/errors.php';
require_once __DIR__ . '/check-users.php';

if (check_reg_users()) {
    set_error_message('Такой пользователь уже существует!');
    header('Location: ../register.php');
}

?>

<!-- Здесь будет регистрация нового пользователя -->

<?php
    header('Location: ../index.php');
?>