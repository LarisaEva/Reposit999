<?php

$array = [
	'admin' => ['articles', 'comments', 'statistics'],
	'editor' => ['articles', 'comments'],
];

// ?role=admin&includes=articles,statistics,comments

if(!isset($_GET['role'])) {
	die ('ошибка 403: нет доступа');
}

$role = $_GET['role'];

if(! array_key_exists($role, $array)) {
	die('ошибка 403:нет доступа');
}

$includes = $_GET['includes'] ?? '';
$includes = explode(',', $includes);

if(array_diff($includes, $array[$role])) {
	die('ошибка 400: неверный запрос');
}
echo 'Данные тута';

