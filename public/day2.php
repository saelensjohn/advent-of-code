<?php

$input = fopen('files/day2/input.txt', 'r');

$validCountPart1 = 0;
$validCountPart2 = 0;
while (($line = fgets($input, 4096)) !== false) {
    preg_match('/([^-]*)-([^ ]*) ([^:]*): ([^*]*)/', $line, $matches);
    $min = $matches[1];
    $max = $matches[2];
    $char = $matches[3];
    $password = $matches[4];

    // Part 1
    $charOccurrence = substr_count($password, $char);
    if ($charOccurrence >= $min && $charOccurrence <=$max) {
        $validCountPart1++;
    }

    // Part 2
    $firstChar = substr($password, $min - 1, 1);
    $secondChar = substr($password, $max - 1, 1);

    if ($char === $firstChar xor $char === $secondChar) {
        $validCountPart2++;
    }
}
fclose($input);

echo sprintf('Valid passwords part 1: %d', $validCountPart1);
echo '<br>';
echo sprintf('Valid passwords part 2: %d', $validCountPart2);
