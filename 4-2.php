<?php

$input = [
  'phone_code' => '+38',
  'phone_number' => '(000) 111-2233',
  'first_name' => 'John',
  'middle_name' => 'Malcolm',
  'last_name' => 'Doe'
];

$output = [
  'phone' =>['phone_number' => $input['phone_number']],
  'name' =>['first_name' => $input['first_name'], 'last_name' => $input['last_name']],
];

if (isset($input['phone_code'])) {
	$output['phone']['phone_code'] = $input['phone_code'];
}


if(isset($input['middle_name'])) {
	$output['name']['middle_name'] = $input['middle_name'];
}

print_r($output);