<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/split-strings
 *
 * Complete the solution so that it splits the string into pairs of two characters.
 * If the string contains an odd number of characters then it should replace the missing second character of the final pair with an underscore ('_').
 *
 * Examples:
 *
 * solution('abc') // should return ['ab', 'c_']
 * solution('abcdef') // should return ['ab', 'cd', 'ef']
 */
function solution(string $str)
{
    if (strlen($str) & 1) {
        $str .= '_';
    }
    return array_filter(str_split($str, 2));
}