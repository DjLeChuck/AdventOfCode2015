<?php

/*
 * Nothing is OK.
 */

$data       = trim(file_get_contents('inputs/day-09.txt'));
$map        = [];
$occurences = ['from' => [], 'to' => []];

foreach (explode("\n", $data) as $line) {
    $parts      = explode(' ', $line);
    $from       = $parts[0];
    $to         = $parts[2];
    $distance   = $parts[4];

    if (!array_key_exists($from, $map)) {
        $map[$from] = [];
    }

    if (!in_array($to, $map[$from])) {
        $map[$from][$to] = $distance;
    }

    if (!array_key_exists($from, $occurences['from'])) {
        $occurences['from'][$from] = 0;
    }

    $occurences['from'][$from]++;

    if (!array_key_exists($to, $occurences['to'])) {
        $occurences['to'][$to] = 0;
    }

    $occurences['to'][$to]++;
}

var_dump($occurences, $map);
