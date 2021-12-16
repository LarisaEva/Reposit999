<?php

$phone1 = '0661002030';
$phone2 = '+38 (';
$phone2 .= substr($phone1, 0, 3);
$phone2 .= ') ';
$phone2 .= substr($phone1, 3, 3);
$phone2 .= '-';
$phone2 .= substr($phone1, 6, 2);
$phone2 .= '-';
$phone2 .= substr($phone1, 8, 2);
echo $phone2 . PHP_EOL;