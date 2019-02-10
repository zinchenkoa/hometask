<?php

$array = [4, 7, 1, 3, 2, 6];

$result = mergeSort($array);

function mergeSort($array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    $array = array_chunk($array, ceil($count/2));
    $left = array_shift($array);
    $right = array_shift($array);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge(array $left, array $right): array
{
    $result = [];

    while (count($left) && count($right))
    {
        if ($left[0] > $right[0]) {
            $result[] = array_shift($left);
            continue;
        }

        if ($right[0] > $left[0]) {
            $result[] = array_shift($right);
        }
    }

    if (count($left)) {
        $result = array_merge($result, $left);
    }

    if (count($right)) {
        $result = array_merge($result, $right);
    }

    return $result;
}

echo 'Before sorting' . PHP_EOL;
print_r($array);

echo PHP_EOL . 'After sorting using merge sort' . PHP_EOL;
print_r($result);


