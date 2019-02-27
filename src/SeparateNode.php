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

    /**
     * SeparateNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        if (!$this->validatePositiveInteger($value)) {
            throw new UnexpectedValueException('Enter a positive number in range 0 - 1000000000');
        }
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

    /**
     * @param $value
     * @return mixed
     */
    public function validatePositiveInteger($value)
    {
        $options = array(
            'options' => array(
                'min_range' => 0,
                'max_range' => 1000000000,
            ),
        );
        return filter_var($value, FILTER_VALIDATE_INT, $options);
    }

}