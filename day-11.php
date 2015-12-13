<?php

$old = 'hepxcrrq';
$new = '';

foreach (str_split($old) as $char) {
    $new .= chr(ord($char) + 1);
}

echo $new.PHP_EOL;

echo 'done'.PHP_EOL;
