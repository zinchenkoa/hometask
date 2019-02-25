<?php

class SeparateNode
{
    private $value;
    private $next = null;
    private $previous = null;

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
     * @return null
     */
    public function getNext()
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
     * @return null
     */
    public function getPrevious()
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