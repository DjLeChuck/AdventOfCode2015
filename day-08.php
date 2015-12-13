<?php

/*
 * Only part one is OK.
 */

$data       = trim(file_get_contents('inputs/day-08.txt'));
$part_one   = null;
$part_two   = explode("\n", $data);
$a          = 0;
$b          = 0;

foreach (explode("\n", $part_one) as $key => $line) {
    $linebis    = substr($part_two[$key], 1);
    $linebis    = substr($linebis, 0, -1);
    $linebis    = str_replace('\"', '"', $linebis);
    $a          += strlen($line);
    $b          += strlen($linebis);
}

echo sprintf('First part: %u', $a - $b).PHP_EOL;
