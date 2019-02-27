<?php

class HashTable
{
    /** @var array  */
    private $storage = [];

    /** @var int */
    private $hashTableMaxLength;

    /** @var ResolverInterface  */
    private $collisionResolver;

    /**
     * HashTable constructor.
     * @param $hashTableMaxLength
     * @param ResolverInterface $colisionResolver
     */
    public function __construct($hashTableMaxLength, ResolverInterface $colisionResolver)
    {
        $this->hashTableMaxLength = $hashTableMaxLength;
        $this->collisionResolver = $colisionResolver;
    }

    public function write($index, $value) {
        if(isset($this->storage[$index]) && !empty($this->storage[$index])) {
            $newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength);
            $this->storage[$newIndex] = $value;
        } else {
            $this->storage[$index] = $value;
        }
    }

}

