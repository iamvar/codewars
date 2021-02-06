<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/reversed-sequence
 *
 * Build a function that returns an array of integers from n to 1 where n>0.
 * Example : n=5 >> [5,4,3,2,1]
 */
function reverseSeq($n)
{
    return range($n, 1);
}
