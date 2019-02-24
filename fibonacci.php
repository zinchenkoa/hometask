<?php

function fibonacci($n)
{

    if ($n === 0 || $n === 1) {
        return $n;
    }

    $result = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $result[$i] = $result[$i - 1] + $result[$i - 2];
    }
    return $result;
}

print_r(fibonacci(1));
