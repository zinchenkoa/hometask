<?php

print_r(index($argv, $argc));

/**
 * @param array $argv
 * @param int $argc
 * @return array|string
 */
function index(array $argv, int $argc)
{
    if (validateInput($argv, $argc)) {

        return getMinCurrencyNotes($argv['1']);
    }

    return 'Please enter valid amount of money. An ATM can issue 1 - 100000 UAH.' . PHP_EOL;
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
                'max_range' => 100000,
            ],
        ];

        return (bool)filter_var($argv[1], FILTER_VALIDATE_INT, $options);
    }

    return false;
}

/**
 * Get minimum number of currency notes and values that sum to given $amount
 *
 * @param int $amount
 * @return array
 */
function getMinCurrencyNotes(int $amount): array
{

    $notesCounter = [];
    $banknotes = getBanknotes();

    while ($amount > 0) {
        $maxBanknote = getMaxBanknote($banknotes, $amount);

        $notesCounter[$maxBanknote] = floor($amount / $maxBanknote);
        $amount %= $maxBanknote;
    }

    return $notesCounter;
}

/**
 * @return array
 */
function getBanknotes(): array
{
    return
        [
            '500',
            '200',
            '100',
            '50',
            '20',
            '10',
            '5',
            '2',
            '1',
        ];
}

/**
 * Get the largest denomination of $banknotes that is smaller than $amount.
 *
 * @param array $banknotes
 * @param int $amount
 * @return int|null
 */
function getMaxBanknote(array $banknotes, int $amount): ?int
{
    if ($amount > 0) {
        foreach ($banknotes as $banknote) {
            if ($banknote <= $amount) {
                return $banknote;
            }
        }
    }
    return null;
}