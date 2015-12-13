<?php

/*
 * Parts one and two are OK.
 */

$data       = trim(file_get_contents('inputs/day-03.txt'));
$data_one   = str_split($data);
$data_two   = str_split($data, 2);
$map        = ['0,0' => 1];
$i          = 0;
$j          = 0;

foreach ($data_one as $dir) {
    if (!isset($map[sprintf('%d,%d', $i, $j)])) {
        $map[sprintf('%d,%d', $i, $j)] = 1;
    }

    switch ($dir) {
        case '>':
            $i++;
            break;
        case '^':
            $j++;
            break;
        case 'v':
            $j--;
            break;
        case '<':
            $i--;
            break;
    }

    $map[sprintf('%d,%d', $i, $j)]++;
}

echo sprintf('First part: %u', count($map)).PHP_EOL;

$map    = [
    ['0,0' => 1],
    ['0,0' => 1],
];
$i      = [0 => 0, 1 => 0];
$j      = [0 => 0, 1 => 0];

foreach ($data_two as $subdata) {
    foreach ([$subdata[0], $subdata[1]] as $x => $dir) {
        if (!isset($map[$x][sprintf('%d,%d', $i[$x], $j[$x])])) {
            $map[$x][sprintf('%d,%d', $i[$x], $j[$x])] = 1;
        }

        switch ($dir) {
            case '>':
                $i[$x]++;
                break;
            case '^':
                $j[$x]++;
                break;
            case 'v':
                $j[$x]--;
                break;
            case '<':
                $i[$x]--;
                break;
        }

        $map[$x][sprintf('%d,%d', $i[$x], $j[$x])]++;

        $x++;
    }
}

echo sprintf('Second part: %u', count(array_merge($map[0], $map[1]))).PHP_EOL;
