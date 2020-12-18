<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/fake-binary
 * Given a string of digits, you should replace any digit below 5 with '0' and any digit 5 and above with '1'.
 * Return the resulting string.
 */
function fake_bin(string $s): string
{
    return preg_replace(['/[1-4]/', '/[5-9]/'], ['0', '1'], $s);
}