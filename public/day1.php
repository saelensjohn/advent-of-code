<?php

$input = array_map('intval', explode(PHP_EOL, file_get_contents('files/day1/input.txt')));

// Part 1
foreach ($input as $x) {
    foreach ($input as $y) {
        if ($x + $y === 2020) {
            echo sprintf('%d * %d = %d', $x, $y, array_product([$x, $y]));
            break 2;
        }
    }
}

echo '<br>';

// Part 2
foreach ($input as $x) {
    foreach ($input as $y) {
        foreach ($input as $z) {
            if ($x + $y + $z === 2020) {
                echo sprintf('%d * %d * %d = %d', $x, $y, $z, array_product([$x, $y, $z]));
                break 3;
            }
        }
    }
}