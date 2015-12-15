<?php

/*
 * Nothing is OK.
 */

$data               = trim(file_get_contents('inputs/day-14.txt'));
/*$data = <<<DAT
Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.
DAT;*/
$reindeers          = [];
$scores             = [];
$flying_duration    = 2503;

foreach (explode("\n", $data) as $line) {
    $matches = [];

    preg_match('`^([A-Z][a-z]*) can fly ([0-9]*) km/s for ([0-9]*) seconds, but then must rest for ([0-9]*) seconds\.$`', $line, $matches);

    $scores[$matches[1]]    = 0;
    $reindeers[$matches[1]] = [
        'speed'     => $matches[2],
        'fly'       => $matches[3],
        'rest'      => $matches[4],
        'action'    => 'flying',
        'countdown' => [
            'fly'   => $matches[3],
            'rest'  => $matches[4],
        ],
    ];
}

for ($x = 1; $x <= $flying_duration; $x++) {
    foreach ($reindeers as $reindeer => &$data) {
        if ('flying' === $data['action']) {
            $scores[$reindeer] += $data['speed'];

            --$data['countdown']['fly'];

            // Check if reindeer must rest
            if (0 === $data['countdown']['fly']) {
                $data['action']             = 'resting';
                $data['countdown']['rest']  = $data['rest'];
            }
        } else {
            --$data['countdown']['rest'];

            // If countdown done, back to flying
            if (0 === $data['countdown']['rest']) {
                $data['action']             = 'flying';
                $data['countdown']['fly']   = $data['fly'];
            }
        }
    }
}

sort($scores);

echo sprintf('First part: %u', end($scores)).PHP_EOL;
