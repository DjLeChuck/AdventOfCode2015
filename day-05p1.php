<?php

/*
 * Part one is OK.
 */

$data       = trim(file_get_contents('inputs/day-05.txt'));
$voyels     = ['a', 'e', 'i', 'o', 'u'];
$forbidden  = ['ab', 'cd', 'pq', 'xy'];
$alphabet   = [];
$good       = [];

foreach(range('a','z') as $i) {
    $alphabet[] = $i.$i;
}

function isValid($str, $voyels, $forbidden, $alphabet) {
    $nb_voyels = 0;

    foreach ($voyels as $voyel) {
        $nb_voyels += substr_count($str, $voyel);
    }

    if ($nb_voyels < 3) {
        return false;
    }

    foreach ($forbidden as $seq) {
        if (false !== strpos($str, $seq)) {
            return false;
        }
    }

    $allowed = false;

    foreach ($alphabet as $seq) {
        if (false !== strpos($str, $seq)) {
            $allowed = true;

            break;
        }
    }

    return $allowed;
}

$valid = 0;

foreach (explode("\n", $data) as $str) {
    $valid += (int) isValid($str, $voyels, $forbidden, $alphabet);
}

echo sprintf('First part: %u', $valid).PHP_EOL;
