<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/simple-consecutive-pairs
 * In this Kata your task will be to return the count of pairs that have consecutive numbers as follows:
 * pairs([1,2,5,8,-4,-3,7,6,5]) = 3
 * The pairs are selected as follows [(1,2),(5,8),(-4,-3),(7,6),5]
 * --the first pair is (1,2) and the numbers in the pair are consecutive; Count = 1
 * --the second pair is (5,8) and are not consecutive
 * --the third pair is (-4,-3), consecutive. Count = 2
 * --the fourth pair is (7,6), also consecutive. Count = 3.
 * --the last digit has no pair, so we ignore.
 */
function pairs(array $arr) : int {
    return array_reduce(
        array_chunk($arr, 2),
        static fn($res, $pair) => max($pair) - min($pair) === 1 ? ++$res : $res ?? 0
    );
}