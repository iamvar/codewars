<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/number-zoo-patrol
 *
 * Background:
 * You're working in a number zoo, and it seems that one of the numbers has gone missing!
 *
 * Zoo workers have no idea what number is missing, and are too incompetent to figure it out, so they're hiring you to do it for them.
 *
 * In case the zoo loses another number, they want your program to work regardless of how many numbers there are in total.
 *
 * Task:
 * Write a function that takes a shuffled list of unique numbers from 1 to n with one element missing (which can be any number including n). Return this missing number.
 *
 * Note: huge lists will be tested.
 *
 * Examples:
 * [1, 3, 4]  =>  2
 * [1, 2, 3]  =>  4
 * [4, 2, 3]  =>  1
 *
 * Solution:
 * The missing number is determined by subtracting the sum of the provided numbers
 * from the Gaussian sum of the sequence expected if no number were missing,
 * which is calculated as the sum of integers from 1 to (number of given elements + 1).
 */
function find_number(array $a): int
{
    $n = count($a) + 1;
    return $n * ($n + 1) / 2 - array_sum($a);
}
