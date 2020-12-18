<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/find-the-divisors
 * Create a function named divisors/Divisors that takes an integer n > 1 and returns an array with all of the integer's divisors(except for 1 and the number itself), from smallest to largest. If the number is prime return the string '(integer) is prime' (null in C#) (use Either String a in Haskell and Result<Vec<u32>, String> in Rust).
 * Example:
 * divisors(12); // => [2, 3, 4, 6]
 * divisors(25); // => [5]
 * divisors(13); // => '13 is prime'
 */
function divisors(int $i)
{
    return array_values(array_filter(range(1, $i - 1), fn($x) => $x > 1 && $i % $x === 0)) ?: "{$i} is prime";
}