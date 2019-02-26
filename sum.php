<?php

$array = [1, 2, 7, 8, 5, 4, 13, 12, 18];
$number = 9;

function myFunction($array, $number)
{
    $result = [];
    foreach ($array as $k1 => $v1) {
        foreach ($array as $k2 => $v2) {
            if ($v1 + $v2 === $number && !in_array([$k2 => $v2, $k1 => $v1], $result, true)) {
                $result[] = [$k1 => $v1, $k2 => $v2];
            }
        }
    }
    return $result;
}

$resultArray = myFunction($array, $number);
print_r($resultArray);
