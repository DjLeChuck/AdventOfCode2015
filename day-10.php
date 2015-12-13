<?php

$data = '1113222113';
//$data = '1';

ini_set('memory_limit', -1);

for ($x = 1; $x <= 50; $x++) {
    $new = '';
    $count = 0;
    $prev = '';

    foreach (str_split($data) as $char) {
        if ($prev !== $char && 0 < $count) {
            $new .= $count.$prev;
            $count = 0;
        }

        $count ++;
        $prev = $char;
    }

    $data = $new.$count.$prev;
}

echo strlen($data).PHP_EOL;
