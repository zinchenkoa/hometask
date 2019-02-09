<?php

const ARGUMENTS_NUMBER_ERROR = -20;
const DIAGONAL_ERROR = -10;
const RANGE_ERROR = 0;

index($argv, $argc);

/**
 * @param array $argv
 * @param int $argc
 */
function index(array $argv, int $argc): void
{
    $status = validateInput($argv, $argc);

    if ($status > 0) {
        makeDiamond($argv[1]);
    } else {
        echo getErrors()[$status] ?? 'Something went wrong.';
        echo PHP_EOL;
    }
}

/**
 * @param array $argv
 * @param int $argc
 * @return int
 */
function validateInput(array $argv, int $argc): int
{
    $diagonal = $argv[1];

    if ($argc !== 2) {
        return ARGUMENTS_NUMBER_ERROR;
    }

    if ($diagonal % 2 === 0) {
        return DIAGONAL_ERROR;
    }

    $options = [
        'options' => [
            'min_range' => 3,
            'max_range' => 79,
        ],
    ];

    return (int)filter_var($diagonal, FILTER_VALIDATE_INT, $options);
}

/**
 * @param int $diagonal
 */
function makeDiamond(int $diagonal): void
{
    $spaces = ($diagonal - 1) / 2;
    $stars = 1;

    for ($i = $spaces; $i >= 0; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo ' ';
        }

        echo $i === $spaces
            ? str_repeat('*', $stars)
            : str_repeat('*', $stars += 2);

        echo PHP_EOL;
    }

    for ($i = 1; $i <= $spaces; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo ' ';
        }

        echo str_repeat('*', $stars -= 2);
        echo PHP_EOL;
    }

}

/**
 * @return array
 */
function getErrors(): array
{
    return [
        '0' => 'Enter odd value in range 3 - 79.',
        '-10' => 'You can\'t build a diamond if both diagonals are even or negative numbers. Enter positive odd number.',
        '-20' => 'Only one diagonal for input is allowed.',
    ];
}