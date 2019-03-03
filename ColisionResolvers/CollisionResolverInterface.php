<?php

interface ResolverInterface
{
    public function resolve(int $index, array $storage, int $size);
    public function fetch(int $index, array $storage, $value, int $size);
}