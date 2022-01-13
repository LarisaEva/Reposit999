<?php

session_start();

$_SESSION['is_auth'] = 0;

header('Location: index.php');