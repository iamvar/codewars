<?php

declare(strict_types=1);

//https://www.codewars.com/kata/mystery-class
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