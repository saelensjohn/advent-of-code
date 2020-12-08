<?php

$input = explode(PHP_EOL, file_get_contents('files/day8/input.txt'));

function processOp($input, $key = 0, $acc = 0, $alreadyProcessed = []): array
{
    if (in_array($key, $alreadyProcessed)) return ['success' => 0, 'acc' => $acc];
    if ($key === count($input)) return ['success' => 1, 'acc' => $acc];

    $alreadyProcessed[] = $key;
    $parsedLine = explode(' ', $input[$key]);
    $op = $parsedLine[0];
    $value = $parsedLine[1];

    switch ($op) {
        case 'acc':
            $acc += $value;
            $key += 1;
            break;
        case 'jmp':
            $key += $value;
            break;
        case 'nop':
        default:
            $key += 1;
    }

    return processOp($input, $key, $acc, $alreadyProcessed);
}

echo sprintf('Result part 1: %d', processOp($input)['acc']);
echo '<br>';

foreach ($input as $key => $line) {
    $newInput = $input;
    $parsedLine = explode(' ', $line);
    $op = $parsedLine[0];

    if ($op === 'app') continue;
    if ($op === 'jmp') $newInput[$key] = sprintf('nop %s', $parsedLine[1]);
    if ($op === 'nop') $newInput[$key] = sprintf('jmp %s', $parsedLine[1]);

    $result = processOp($newInput);
    if ($result['success']) {
        echo sprintf('Result part 2: %d', $result['acc']);
        break;
    }
}
