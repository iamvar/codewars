<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/find-the-odd-int
 *
 * Given an array of integers, find the one that appears an odd number of times.
 * There will always be only one integer that appears an odd number of times.
 */
function findIt(array $seq): int
{
    return key(array_filter(array_count_values($seq), function ($v) {
        return $v & 1;
    }));
}
