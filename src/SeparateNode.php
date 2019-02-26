<?php

class SeparateNode
{
    private $value;

    /**
     * @var SeparateNode
     */
    private $next = null;

    /**
     * @var SeparateNode
     */
    private $previous = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return SeparateNode|null
     */
    public function getNext(): ?SeparateNode
    {
        return $this->next;
    }

    /**
     * @param null $next
     */
    public function setNext($next): void
    {
        $this->next = $next;
    }

    /**
     * @return SeparateNode|null
     */
    public function getPrevious(): ?SeparateNode
    {
        return $this->previous;
    }

    /**
     * @param null $previous
     */
    public function setPrevious($previous): void
    {
        $this->previous = $previous;
    }

}