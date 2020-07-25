<?php

declare(strict_types=1);

//https://www.codewars.com/kata/where-my-anagrams-at
//What is an anagram? Well, two words are anagrams of each other if they both contain the same letters. For example:
//
//'abba' & 'baab' == true
//'abba' & 'bbaa' == true
//'abba' & 'abbba' == false
//'abba' & 'abca' == false
//Write a function that will find all the anagrams of a word from a list. You will be given two inputs a word and an array with words. You should return an array of all the anagrams or an empty array if there are none. For example:

function anagrams(string $word, array $words): array {
    $main = str_split($word);
    sort($main);
    return array_values(array_filter($words, function ($w) use ($main) {
        $compare = str_split($w);
        sort($compare);
        return $compare === $main;
    }));
}