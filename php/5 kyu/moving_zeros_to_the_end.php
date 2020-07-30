<?php

declare(strict_types=1);

// https://www.codewars.com/kata/moving-zeros-to-the-end
// Write an algorithm that takes an array and moves all of the zeros to the end, preserving the order of the other elements.
// move_zeros([false,1,0,1,2,0,1,3,"a"]) returns[false,1,1,2,1,3,"a",0,0]


function moveZeros(array $items): array
{
    $res = [];
    $zeros = [];
    foreach ($items as $i) {
        $i === 0 || $i === 0.0 ? $zeros[] = 0 : $res[] = $i;
    }

    return array_merge($res, $zeros);
}

