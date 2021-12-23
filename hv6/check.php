<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    header('Location: test.php');

    exit;
}

$isDataNotExists = empty($_POST['result']);

if (empty($_POST['result']) || count($_POST['result']) != 12) {
    header('Location: test.php?form_error_code=1000');

    exit;
}

$trueResult = 0;
$falseResult = 0;
for ($i = 0; $i < 12; $i++) {
	foreach ($_POST['result'][$i] as $key => $value) {
		echo 'Задача № ' . $i + 1 . '. Ваш ответ:  ' . $value . '. Правильный ответ:  ' . $key . '. ';
		if ($key == $value) {
			echo 'Ваш ответ - правильный.';
			$trueResult++;
		} else {
			echo 'Ваш ответ - неправильный.';
			$falseResult++;
		}
		echo '</br>';
	}
}
echo 'Вы решили ' . $trueResult . ' задач правильно и ' . $falseResult . ' задач неправильно.</br>';
echo 'Ваша оценка - ' . round(5 * $trueResult / 12) . ' / 5.</br>';
?>