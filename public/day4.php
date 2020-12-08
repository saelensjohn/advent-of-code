<?php

const REQUIRED_FIELDS = [
    'byr',
    'iyr',
    'eyr',
    'hgt',
    'hcl',
    'ecl',
    'pid',
];

function checkIfPassportValidPart1(string $passport): bool
{
    foreach (REQUIRED_FIELDS as $requiredField) {
        if (strpos($passport, $requiredField) === false) {
            return false;
        }
    }

    return true;
}


function checkIfPassportValidPart2(string $passport): bool
{
    foreach (REQUIRED_FIELDS as $requiredField) {
        if (strpos($passport, $requiredField) !== false) {
            switch ($requiredField) {
                case 'byr':
                    if ($passport)
                    break;
                case 'iyr':
                    break;
                case 'eyr':
                    break;
                case 'hgt':
                    break;
                case 'hcl':
                    break;
                case 'ecl':
                    break;
                case 'pid':
                    break;
            }
        }
    }

    return true;
}

$passports = explode(PHP_EOL.PHP_EOL, file_get_contents('files/day4/input.txt'));

$validPassports = 0;
foreach ($passports as $passport) {
    if (checkIfPassportValidPart1($passport)) $validPassports++;
}

echo sprintf('Valid passports part 1: %d', $validPassports);