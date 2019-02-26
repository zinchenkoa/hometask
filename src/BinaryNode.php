<?php

class BinaryNode
{

    private $value;

    /** @var BinaryNode */
    private $left = null;

    /** @var BinaryNode */
    private $right = null;

    /**
     * @param mixed $value
     */
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
     * @return BinaryNode|null
     */
    public function getLeft(): ?BinaryNode
    {
        return $this->left;
    }

    /**
     * @param BinaryNode $left
     */
    public function setLeft(BinaryNode $left): void
    {
        $this->left = $left;
    }

    /**
     * @return BinaryNode|null
     */
    public function getRight(): ?BinaryNode
    {
        return $this->right;
    }

    /**
     * @param BinaryNode $right
     */
    public function setRight(BinaryNode $right): void
    {
        $this->right = $right;
    }

}