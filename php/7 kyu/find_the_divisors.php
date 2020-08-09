<?php

declare(strict_types=1);

//https://www.codewars.com/kata/find-the-divisors

function divisors(int $i) {
    return array_values(array_filter(range(1, $i-1), fn($x) => $x > 1 && $i % $x === 0)) ?: "{$i} is prime";
}
