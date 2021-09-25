<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/range-extraction
 *
 * A format for expressing an ordered list of integers is to use a comma separated list of either
 * individual integers or a range of integers denoted by the starting integer
 * separated from the end integer in the range by a dash, '-'.
 * The range includes all integers in the interval including both endpoints.
 * It is not considered a range unless it spans at least 3 numbers. For example "12,13,15-17"
 * Complete the solution so that it takes a list of integers in increasing order
 * and returns a correctly formatted string in the range format.
 *
 * Example:
 * solution([-6, -3, -2, -1, 0, 1, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20])
 * returns '-6,-3-1,3-5,7-11,14,15,17-20'
 */
function solution(array $list): string
{
    $result = [];

    for ($i = 0, $cnt = count($list); $i < $cnt; $i++) {
        $k = 1;

        while ($list[$i] + $k === ($list[$i + $k] ?? null)) {
            $k++;
        }

        if ($k-- >= 3) {
            $result[] = $list[$i] . '-' . $list[$i + $k];
            $i += $k;
        } else {
            $result[] = $list[$i];
        }
    }

    return implode(',', $result);
}
