<?php
index($argv, $argc);

function index($argv, $argc)
{

    if (validateInput($argv, $argc)) {
        getSnakeArray($argv[1]);
        return;
    }

    echo 'Please enter number from 1 to 35 to print snake array.' . PHP_EOL;
}


/**
 * @param array $argv
 * @param int $argc
 * @return bool
 */
function validateInput(array $argv, int $argc): bool
{

    if ($argc === 2) {
        $options = [
            'options' => [
                'min_range' => 1,
                'max_range' => 70,
            ],
        ];
        return (bool)filter_var($argv[1], FILTER_VALIDATE_INT, $options);
    }
    return false;
}

/**
 * @param int $edge
 */
function getSnakeArray(int $edge): void
{

    for ($y = 1; $y <= $edge; $y++) {

        for ($x = 1; $x <= $edge; $x++) {
            if ($x === 1) {
                echo $y . ' ';
            } elseif ($x % 2) {
                echo $edge * ($x - 1) + $y . ' ';
            } else {
                echo $edge * $x - ($y - 1) . ' ';
            }
        }

        echo PHP_EOL;
    }
}