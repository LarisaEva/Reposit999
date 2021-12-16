<?php

$array = [13, 34, 87, 77, 12, 87, 87];

$max = $array[0];  
$min = $array[0];
$num_max = 0;
$num_min = 0;

foreach ($array as $value) {
	if($value>$max) {
		$max = $value;
	} 
}

foreach($array as $value) {
	if($value<$min) {
		$min = $value;
	}
}

foreach ($array as $value) {
	if($value == $max) {
		$num_max++;
	}
}

foreach($array as $value) {
	if ($value == $min) { 
		$num_min++;
	}
}
echo 'количество максимумов в массиве - ' . $num_max . '<br>';
echo 'количество минимумов в массиве - ' . $num_min;