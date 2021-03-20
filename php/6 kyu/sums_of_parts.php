<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/sums-of-parts
 * Let us consider this example (array written in general format):
 * ls = [0, 1, 3, 6, 10]
 * Its following parts:
 * ls = [0, 1, 3, 6, 10]
 * ls = [1, 3, 6, 10]
 * ls = [3, 6, 10]
 * ls = [6, 10]
 * ls = [10]
 * ls = []
 * The corresponding sums are (put together in a list): [20, 20, 19, 16, 10, 0]
 */
function partsSums($ls)
{
    $sum = array_sum($ls);
    $res = [$sum];
    foreach ($ls as $l) {
        $sum -= $l;
        $res[] = $sum;
    }

    return $res;
}
