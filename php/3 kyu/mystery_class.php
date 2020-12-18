<?php

declare(strict_types=1);

/**
 * @link https://www.codewars.com/kata/mystery-class
 *
 * You will be given the name of a 'mysterious' class that you don't know the source code for.
 * Your challenge is to somehow make that class throw a special exception, the MysterySolvedException.
 * Write a solveTheMystery function that successfully does this for any class name that is passed into it.
 * Note that the exception must be thrown from within the given class' internal logic.
 * In other words: a throw keyword already part of its code must be the origin of the exception.
 * There is some fairly devious trickery up ahead, but if you have a good general approach that passes the example tests,
 * you should be able to beat this kata.
 * One hint: this will require some fairly extensive knowledge of PHP language specific features.
 */
function solveTheMystery(string $mystery)
{
    $r = new ReflectionClass($mystery);
    $c = $r->isAbstract() ? null : $r->newInstanceWithoutConstructor();
    foreach ($r->getProperties() as $p) {
        if (strpos($p->getDocComment(), '@condition') !== false) {
            $p->setAccessible(true);
            $p->setValue($c, true);
        }
    }

    foreach ($r->getMethods() as $m) {
        if (strpos($m->getDocComment(), '@here') !== false) {
            $m->setAccessible(true);
            try {
                throw $m->invoke($c, true);
            } catch (Exception $e) {
                while (!($e instanceof MysterySolvedException) && $e->getPrevious()) {
                    $e = $e->getPrevious();
                }

                if ($e instanceof MysterySolvedException) {
                    throw $e;
                }
            }
        }
    }
}