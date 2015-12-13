<?php

$data = <<<DAT
AlphaCentauri to Snowdin = 66
AlphaCentauri to Tambi = 28
AlphaCentauri to Faerun = 60
AlphaCentauri to Norrath = 34
AlphaCentauri to Straylight = 34
AlphaCentauri to Tristram = 3
AlphaCentauri to Arbre = 108
Snowdin to Tambi = 22
Snowdin to Faerun = 12
Snowdin to Norrath = 91
Snowdin to Straylight = 121
Snowdin to Tristram = 111
Snowdin to Arbre = 71
Tambi to Faerun = 39
Tambi to Norrath = 113
Tambi to Straylight = 130
Tambi to Tristram = 35
Tambi to Arbre = 40
Faerun to Norrath = 63
Faerun to Straylight = 21
Faerun to Tristram = 57
Faerun to Arbre = 83
Norrath to Straylight = 9
Norrath to Tristram = 50
Norrath to Arbre = 60
Straylight to Tristram = 27
Straylight to Arbre = 81
Tristram to Arbre = 90
DAT;

$data = <<<DAT
London to Dublin = 464
London to Belfast = 518
Dublin to Belfast = 141
DAT;

$map = [];
$occurences = ['from' => [], 'to' => []];

foreach (explode("\n", $data) as $line) {
    $parts = explode(' ', $line);
    $from = $parts[0];
    $to = $parts[2];
    $distance = $parts[4];

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
