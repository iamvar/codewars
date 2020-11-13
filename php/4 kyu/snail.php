<?php
declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/snail
 *
 * Given an n x n array, return the array elements arranged from outermost elements to the middle element, traveling clockwise.
 * array = [[1,2,3],
 *          [4,5,6],
 *          [7,8,9]]
 * snail(array) #=> [1,2,3,6,9,8,7,4,5]
 */
function snail(array $array): array {
    $start = array_shift($array);
    $reverse = array_reverse(array_pop($array) ?? []);
    $edge = [];
    foreach ($array as &$line) {
        $start[] = array_pop($line);
        $edge[] = array_shift($line);
    }

    $tail = $array ? snail($array) : [];
    return array_merge($start, $reverse, array_reverse($edge), $tail);
}