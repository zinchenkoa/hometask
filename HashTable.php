<?php

class HashTable
{
    /** @var array */
    private $storage = [];

    /** @var int */
    private $hashTableMaxLength;

    /** @var ResolverInterface */
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

    /**
     * @param int $index
     * @param $value
     */
    public function write(int $index, $value)
    {
        if (isset($this->storage[$index]) && !empty($this->storage[$index])) {
            $newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength);
            $this->storage[$newIndex] = $value;
        } else {
            $this->storage[$index] = $value;
        }
    }

    /**
     * @param int $index
     * @param mixed $value
     * @return array
     * @throws Exception
     */
    public function get(int $index, $value): array
    {
        if (!isset($this->storage[$index]) || empty($this->storage[$index])) {
            throw new Exception("Value $value not found.");
        }
        if ($this->storage[$index] !== $value) {
            $index = $this->collisionResolver->fetch($index, $this->storage, $value, $this->hashTableMaxLength);
        }
        return [$index => $value];
    }
}
