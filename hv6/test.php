<?php if (isset($_GET['form_error_code'])): ?>
    <?php require_once __DIR__ . 'error_codes.php'; ?>
    <div style="margin-bottom: 15px; padding: 15px; background-color: red; color: white;">
        <?php echo FORM_ERROR_MESSAGES[(int)$_GET['form_error_code']]; ?>
    </div>
<?php endif ?>


<?php 

for ($i = 0; $i < 12; $i++) {
	$array[$i][0] = random_int(-100, 100);
	$array[$i][1] = random_int(-100, 100);
}

for ($i = 0; $i < 3; $i++) {
	$array[$i][2] = $array[$i][0] + $array[$i][1];
	$array[$i][3] = $array[$i][0] . ' + ';
}

for ($i = 3; $i < 6; $i++) {
	$array[$i][2] = $array[$i][0] - $array[$i][1];
	$array[$i][3] = $array[$i][0] . ' - ';
}

for ($i = 6; $i < 9; $i++) {
	$array[$i][2] = $array[$i][0] * $array[$i][1];
	$array[$i][3] = $array[$i][0] . ' * ';
}

for ($i = 9; $i < 12; $i++) {
	$array[$i][2] = $array[$i][0] / $array[$i][1];
	$array[$i][3] = $array[$i][0] . ' / ';
}


for ($i = 0; $i < 12; $i++) {
	$array[$i][2] = round($array[$i][2], 2);
	if ($array[$i][1] < 0 ) {
		$array[$i][3] .= ' ( ' . $array[$i][1] . ' ) ';
	} else {
		$array[$i][3] .= $array[$i][1];
	}
	$array[$i][3] .= ' = ';
}
?>


<p>Контрольная по арифметике</p>
<p>Решите несколько несложных примеров (дробные результаты округлите до двух знаков после запятой):</p>
<form action="check.php" method="post">
<table>

<?php for ($i = 0; $i < 12; $i++) : ?>
	<p><?php echo $array[$i][3] ?><input type="text" name="result[<?php echo $i ?>][<?php echo $array[$i][2] ?>]" required="required"></p>
<?php endfor; ?>
	<button type="submit">
        	Пройти тест
	</button>
</form>



