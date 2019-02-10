<?php

$array = [2, 5, 1, 18, 10, 4, 9, 32, 0, -5];

/**
 * @param array $array
 * @return array
 */
function bubbleSort(array $array): array
{
    $count = count($array);

    for ($i = 0; $i < $count ; $i++) {
        for ($j = $count - 1; $j > $i; $j--) {

            if ($array[$j] < $array[$j-1]) {
                $t = $array[$j - 1];
                $array[$j - 1] = $array[$j];
                $array[$j] = $t;
            }
        }
    }
    return $array;
}

echo 'Before sorting' . PHP_EOL;
print_r($array);

$array = bubbleSort($array);
echo 'After sorting using bubble sort' . PHP_EOL;
print_r($array);
