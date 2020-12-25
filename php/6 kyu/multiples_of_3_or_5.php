<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/multiples-of-3-or-5
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
 * The sum of these multiples is 23.
 * Finish the solution so that it returns the sum of all the multiples of 3 or 5 below the number passed in.
 * Note: If the number is a multiple of both 3 and 5, only count it once. Also, if a number is negative, return 0
 */
function solution($number){
    return $number < 0 ? 0 : array_sum(array_filter(range(1, $number - 1), function ($i) {
        return $i % 3 === 0 || $i % 5 === 0;
    }));
}