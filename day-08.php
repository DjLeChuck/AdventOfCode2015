<?php

/*
 * Only part one is OK.
 */

$data   = trim(file_get_contents('inputs/day-08.txt'));
$a      = 0;
$b      = 0;

foreach (explode("\n", $data) as $key => $line) {
    $linebis    = substr($line, 1);
    $linebis    = substr($linebis, 0, -1);
    $linebis    = str_replace(['\"', '\\\\'], '"', $linebis);
    $linebis    = preg_replace('`(\\\\x[a-f0-9]{2})`', 'x', $linebis);
    $a          += strlen($line);
    $b          += strlen($linebis);
}

echo sprintf('First part: %u', $a - $b).PHP_EOL;
