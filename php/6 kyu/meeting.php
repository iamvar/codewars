<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/meeting
 *
 * John has invited some friends. His list is:
 * s = "Fred:Corwill;Wilfred:Corwill;Barney:Tornbull;Betty:Tornbull;Bjon:Tornbull;Raphael:Corwill;Alfred:Corwill";
 * Could you make a program that makes this string uppercase
 * gives it sorted in alphabetical order by last name.
 * When the last names are the same, sort them by first name.
 * Last name and first name of a guest come in the result between parentheses separated by a comma.
 * So the result of function meeting(s) will be:
 * "(CORWILL, ALFRED)(CORWILL, FRED)(CORWILL, RAPHAEL)(CORWILL, WILFRED)(TORNBULL, BARNEY)(TORNBULL, BETTY)(TORNBULL, BJON)"
 * It can happen that in two distinct families with the same family name two people have the same first name too.
 */
function meeting(string $s): string
{
    preg_match_all("|([^:]+):([^;]+);?|", strtoupper($s), $guests, PREG_SET_ORDER);
    usort($guests, static function ($a, $b) {
        $surnameDiff = strcmp($a[2], $b[2]);
        return $surnameDiff === 0 ? strcmp($a[1], $b[1]) : $surnameDiff;
    });

    return array_reduce($guests, static function ($carry, $data) {
        return $carry . "({$data[2]}, {$data[1]})";
    }, '');
}

function meeting_better_solution(string $s): string
{
    $result = array_map(static function ($pair) {
        [$name, $surname] = explode(':', $pair);
        return "({$surname}, {$name})";
    }, explode(';', strtoupper($s)));
    sort($result);
    return implode($result);
}
