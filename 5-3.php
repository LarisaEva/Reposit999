<?php

$num = 345264;
$string = strval($num); //число стало строкой,
$length = strlen($num); //узнаю длину числа,
$half = $length/2; // сколько цифр в половине числа,
$left = 0;
$right = 0;
for($i = 0; $i < $half; $i++) {
	$left += substr($string, $i, 1);
	$right+= substr($string, (-$i - 1), 1);
}

if($left === $right) {
	echo 'Поздравляем! Это число счастливое!';
} else {
	echo 'В этот раз не повезло:(';
}


