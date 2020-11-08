<?php
declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/permutations
 *
 * In this kata you have to create all permutations of an input string and remove duplicates, if present.
 * This means, you have to shuffle all letters from the input in all possible orders.
 *
 * Examples:
 * permutations('a'); // => ['a']
 * permutations('ab'); // => ['ab', 'ba']
 * permutations('aabb'); // => ['aabb', 'abab', 'abba', 'baab', 'baba', 'bbaa']
 */
function permutations(string $s): array {
    if (strlen($s) <= 1) {
        return [$s];
    }

    $permutations = [];
    $tail = substr($s, 1);
    foreach (permutations($tail) as $permutation) {
        $length = strlen($permutation);
        for ($i = 0; $i <= $length; $i++) {
            $item = substr($permutation, 0, $i) . $s[0] . substr($permutation, $i);
            $permutations[$item] = $item;
        }
    }
    return array_values($permutations);
}
