<?php

$array = [13, 45, 23, 45, 67, 93];

$repeat = false;
foreach ($array as $key1 => $elem1) {
	foreach ($array as $key2 => $elem2) {
		if ($elem2 == $elem1 && $key2 != $key1) {
			$repeat = true;
		}
	}
}

if ($repeat) { //$repeat == true
    echo 'В массиве есть повторы';
} else {
    echo 'В массиве нет повторов';;
}

echo PHP_EOL;