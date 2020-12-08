<?php

const TRAVERSALS = [
    [1, 1],
    [3, 1],
    [5, 1],
    [7, 1],
    [1, 2],
];

function traverseTrees(int $right, int $down = 1) {
    $input = fopen('files/day3/input.txt', 'r');
    $treeEncounterCount = 0;
    $currentRightPosition = 0;
    $currentDownPosition = $down;

    $patternLength = strlen(fgets($input, 4096)) - 1;

    while (($line = fgets($input, 4096)) !== false) {

        if ($currentDownPosition > 1) {
            $currentDownPosition--;
            continue;
        } else {
            $currentDownPosition = $down;
        }

        $currentRightPosition += $right;
        $currentRightPosition %= $patternLength;

        if (substr($line, $currentRightPosition, 1) === '#') $treeEncounterCount++;
    }
    fclose($input);

    return $treeEncounterCount;
}

$productTrees = 1;
foreach (TRAVERSALS as $traversal) {
    $totalTrees = traverseTrees($traversal[0], $traversal[1]);
    $productTrees *= $totalTrees;
    echo sprintf('Total trees encountered: %d', $totalTrees);
    echo '<br>';
}

echo sprintf('Product trees encountered: %d', $productTrees);