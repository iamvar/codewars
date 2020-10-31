<?php
declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/pyramid-array
 *
 * Write a function that when given a number >= 0, returns an Array of ascending length subarrays.
 * pyramid(0) => [ ]
 * pyramid(1) => [ [1] ]
 * pyramid(2) => [ [1], [1, 1] ]
 * pyramid(3) => [ [1], [1, 1], [1, 1, 1] ]
 * Note: the subarrays should be filled with 1s
 */
function pyramid($n) {
    $res = [];
    for ($i = 1; $i <= $n; $i++) {
        $res[] = array_fill(0, $i, 1);
    }
    return $res;
}