<?php

require_once __DIR__ . '/CollisionResolverInterface.php';

class CollisionResolverPlus1 implements ResolverInterface
{
    /**
     * @param int $index
     * @param array $storage
     * @param int $size
     * @return int
     * @throws Exception
     */
    public function resolve(int $index, array $storage, int $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw new Exception('Our table is full');
                }

                $j = 0;
                $flag = true;
            }

            if (
                isset($storage[$j])
                && !empty($storage[$j])) {
                continue;
            }
            return $j;

        }
    }


    /**
     * @param int $index
     * @param array $storage
     * @param $value
     * @param int $size
     * @return int|null
     * @throws Exception
     */
    public function fetch(int $index, array $storage, $value, int $size): ?int
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if (isset($storage[$j]) && $storage[$j] === $value) {
                return $j;
            }

            if ($j >= $size) {
                if ($flag) {
                    throw new Exception('Not found');
                }

                $j = 0;
                $flag = true;
            }
        }

        return null;
    }
}