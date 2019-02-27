<?php

require_once __DIR__ . '/CollisionResolverInterface.php';

class CollisionResolverPlus1 implements ResolverInterface
{
    public function resolve($index, $hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw Exception('Our table is full');
                }

                $j = 0;
                $flag = true;
            }

            if (
                isset($hranilishche[$j])
                && !empty($hranilishche[$j])) {
                continue;
            } else {
                return $j;
            }
        }
    }
}