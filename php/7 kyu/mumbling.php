<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/mumbling
 * This time no story, no theory. The examples below show you how to write function accum:
 *
 * Examples:
 *
 * accum("abcd") -> "A-Bb-Ccc-Dddd"
 * accum("RqaEzty") -> "R-Qq-Aaa-Eeee-Zzzzz-Tttttt-Yyyyyyy"
 * accum("cwAt") -> "C-Ww-Aaa-Tttt"
 */
function accum(string $s): string
{
    $res = [];
    foreach (str_split(strtolower($s)) as $i => $c) {
        $res[] = ucfirst(str_repeat($c, $i + 1));
    }

    return implode('-', $res);
}