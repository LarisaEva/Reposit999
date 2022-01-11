<?php

function str_to_array(string $string): array|bool {
	$array = mb_str_split(trim($string));

	$separators = [' ', '-', '_'];
	$sep_indexis = [];

	foreach ($array as $key => $elem) {
		foreach ($separators as $separator) {
    			if ($elem === $separator) {
				$sep_indexis[] = $key;
			}
		}
	}
	if (empty($sep_indexis)) {
		return false;
	}
	$sep_indexis[] = count($array);

	$results = [];
	$start = 0;
	$i = 0;
	foreach ($sep_indexis as $index) {
		if ($index == ($start + 1)) {
			$start = $index + 1;
			continue;
		}
		$results[$i] = '';
		for ($j = $start; $j < $index; $j++) {
			$results[$i] .= $array[$j];	
		}
		$start = $index + 1;
		$i++;
	}
	return $results;
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

	$array = str_to_array($string);

	if (false === $array) {
		if (check_upper($string)) {
			echo 'Этa строкa уже является Camel Case!' . PHP_EOL;
		} else {
			echo 'Эту строку невозможно преобразовать в Camel Case!' . PHP_EOL;
		}
		return $string;
	} 

	$result = $array[0];

	for ($i = 1; $i < count($array); $i++) {
		if (ord($array[$i]) > 64 && ord($array[$i]) < 91) {
			$result .= $array[$i];
		} else {
			$result .= ucfirst($array[$i]);
		}
	}
	$cache[$string] = $result;
	return $result;
}

$strings = ['hello world',
            'hello- world',
            'hello_wild world',
            'helloWorld',
            'hello World',
            'helloworld'];

foreach ($strings as $string) {
	echo $string . ' => ';
	echo str_to_camel($string) . PHP_EOL;
}