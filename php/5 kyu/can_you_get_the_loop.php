<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/can-you-get-the-loop
 * You are given a node that is the beginning of a linked list. This list always contains a tail and a loop.
 * Your objective is to determine the length of the loop.
 * Use the Node::getNext() instance method to get the following node.
 * Note: do NOT mutate the nodes!
 */
function loop_size(Node $node): int {
    $i = 1;
    $chain = [spl_object_id($node) => $i];
    while (!isset($chain[$key = spl_object_id($node = $node->getNext())])) {
        $chain[$key] = $i++;
    }
    return (count($chain) - $chain[$key]) ?: 1;
}