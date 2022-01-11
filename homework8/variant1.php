<?php

function detect_separator(string $string): mixed {
	if (false !== strpos($string, ' ')) {
		return ' ';
	}
	if (false !== strpos($string, '-')) {
		return '-';
	}
	if (false !== strpos($string, '_')) {
		return '_';
	}
	return false;
}

function check_upper(string $string): bool {
	$symbols = mb_str_split(trim($string));
	foreach ($symbols as $symbol) {
		if (ord($symbol) > 64 && ord($symbol) < 91) {
			return true;
		}
	}
	return false;
}

function str_to_camel(string $string): string {
	static $cache = [];

	if (array_key_exists($string, $cache)) {
		echo 'Эта строка уже преобразовывалась в Camel Case!' . PHP_EOL;
		return $cache[$string];
	}

	$separator = detect_separator($string);

	if (false === $separator) {
		if (check_upper($string)) {
			echo 'Этa строкa уже является Camel Case!' . PHP_EOL;
		} else {
			echo 'Эту строку невозможно преобразовать в Camel Case!' . PHP_EOL;
		}
		return $string;
	} 

	$array = explode($separator, $string);
	$result = $array[0];
	for ($i = 1; $i < count($array); $i++) {
		$result .= ucfirst($array[$i]);
	}
	$cache[$string] = $result;
	return $result;
}

$strings = ['hello world',
            'hello-world',
            'hello_world',
            'helloWorld',
            'hello world',
            'helloworld'];

foreach ($strings as $string) {
	echo $string . ' => ';
	echo str_to_camel($string) . PHP_EOL;
}