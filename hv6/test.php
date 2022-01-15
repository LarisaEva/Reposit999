<?php if (isset($_GET['form_error_code'])): ?>
    <?php require_once __DIR__ . 'error_codes.php'; ?>
    <div style="margin-bottom: 15px; padding: 15px; background-color: red; color: white;">
        <?php echo FORM_ERROR_MESSAGES[(int)$_GET['form_error_code']]; ?>
    </div>
<?php endif ?>


<?php

function calculate($a, $b, $operation)
{
    if (!is_numeric($a) || !is_numeric($b)) {
        return null;
    }

    return match ($operation) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $a / $b
    };
}

$operations = ['+', '-', '*', '/'];

for ($i = 0; $i < 12; $i++) {
	$array[$i]['a'] = random_int(-100, 100);
	$array[$i]['b'] = random_int(-100, 100);
}

$number = 0;
for ($i = 0; $i < count($operations); $i++) {
	for ($j = 0; $j < 3; $j++) {
		$array[$number]['total'] = round(calculate($array[$number]['a'],$array[$number]['b'], $operations[$i]), 2);
		$array[$number]['operation'] = $array[$number]['a'] . ' ' . $operations[$i] . ' ';
		if ($array[$number]['b'] < 0 ) {
			$array[$number]['operation'] .= '( ' . $array[$number]['b'] . ' )';
		} else {
			$array[$number]['operation'] .= $array[$number]['b'];
		}
		$array[$number]['operation'] .= ' = ';
		$number++;
	}
}

?>


<p>Контрольная по арифметике</p>
<p>Решите несколько несложных примеров (дробные результаты округлите до двух знаков после запятой):</p>
<form action="check.php" method="post">
<table>

<?php for ($i = 0; $i < 12; $i++) : ?>
	<p><?php echo $array[$i]['operation'] ?><input type="text" name="operation[<?php echo $i ?>]?>]" required="required"></p>
 	<input type="hidden" id="result[<?php echo $i ?>]" name="result[<?php echo $i ?>]" value="<?php echo $array[$i]['total'] ?>">
<?php endfor; ?>
	<button type="submit">
        	Пройти тест
	</button>
</form>



