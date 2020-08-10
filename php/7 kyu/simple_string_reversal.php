<?php

declare(strict_types=1);

// https://www.codewars.com/kata/simple-string-reversal
// In this Kata, we are going to reverse a string while maintaining the spaces (if any) in their original place.
//
// For example:
//
// solve("our code") = "edo cruo"
// -- Normal reversal without spaces is "edocruo".
// -- However, there is a space after the first three characters, hence "edo cruo"
//
// solve("your code rocks") = "skco redo cruoy"
// solve("codewars") = "srawedoc"

function solve($s): string {
    $r = str_split((str_replace(' ', '', $s)));
    $res = '';
    foreach (str_split($s) as $c) {
        $res .= $c === ' ' ? $c : array_pop($r);
    }

    return $res;
}
