<?php

/*
 * Part two is not OK.
 */

$data = trim(file_get_contents('inputs/day-05.txt'));

function isValid($str) {
    $passed = [];

    foreach (str_split($str) as $key => $char) {
        $passed[$i] = $char;
    }
}

$valid = 0;

foreach (explode("\n", $data) as $str) {
    $valid += (int) isValid($str);
}

echo sprintf('Second part: %u', $valid).PHP_EOL;
