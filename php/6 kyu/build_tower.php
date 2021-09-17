<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/build-tower
 *
 * Build Tower by the following given argument:
 * number of floors (integer and always greater than 0).
 *
 * Tower block is represented as *
 *
 * for example, a tower of 3 floors looks like below
 *
 * [
 * '  *  ',
 * ' *** ',
 * '*****'
 * ]
 * and a tower of 6 floors looks like below
 *
 * [
 * '     *     ',
 * '    ***    ',
 * '   *****   ',
 * '  *******  ',
 * ' ********* ',
 * '***********'
 * ]
 */
function tower_builder(int $n): array {
    $tower = [];

    for ($i = $n - 1; $i >= 0; $i--) {
        $s = str_repeat(' ', $i);
        $tower[] = $s . str_repeat('*', 2 * ($n - $i) - 1) . $s;
    }

    return $tower;
}
