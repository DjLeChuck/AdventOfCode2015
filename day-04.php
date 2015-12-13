<?php

$secret = 'ckczppom';
$number = 0;
$hash = null;

do {
	$number++;
	$hash = md5($secret.$number);
} while (substr($hash, 0, 5) !== '00000');

echo $number;

echo '<br><br>';

$number = 0;

do {
	set_time_limit(1);
	$number++;
	$hash = md5($secret.$number);
} while (substr($hash, 0, 6) !== '000000');

echo $number;

echo '<br><br>done';
