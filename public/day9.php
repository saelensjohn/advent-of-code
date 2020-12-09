<?php

$input = array_map('intval', explode(PHP_EOL, file_get_contents('files/day9/input.txt')));

$preambleLength = 25;
$startPosition = 25;
$invalidNr = '';
foreach ($input as $key => $line) {
    $possibleCombinations = [];
    for($i = $startPosition - $preambleLength; $i < $startPosition; $i++) {
        for ($j = $startPosition - $preambleLength; $j < $startPosition; $j++) {
            if ($i !== $j) {
                $possibleCombinations[] = $input[$i] + $input[$j];
            }
        }
    }


    if (!in_array($input[$startPosition], $possibleCombinations)) {
        $invalidNr = $input[$startPosition];
        break;
    }

    $startPosition++;
}

echo sprintf('Answer part 1: %d', $invalidNr);
echo '<br>';

foreach ($input as $key => $line) {
    $sum = 0;
    $sumArray = [];

    for ($i = $key; $i < count($input); $i++) {
        $sum += $input[$i];
        $sumArray[] = $input[$i];

        if ($sum > $invalidNr) break;

        if ($sum === $invalidNr) {
            echo sprintf('Answer part 2: %d + %d = %d', min($sumArray), max($sumArray),  min($sumArray) + max($sumArray));
            break 2;
        }
    }
}

