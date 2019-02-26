<?php
require_once __DIR__ . '/SeparateNode.php';

class LinkedList
{

    /** @var SeparateNode */
    private $head = null;

    /** @var SeparateNode */
    private $tail = null;

    /**
     * Append using tail
     * @param $value
     */
    public function append($value): void
    {
        $obj = new SeparateNode($value);

        if ($this->head === null) {
            $this->head = $obj;
            $this->tail = $obj;
            return;
        }

        $this->tail->setNext($obj);
        $obj->setPrevious($this->tail);
        $this->tail = $obj;
    }

    /**
     * Prepend using head
     * @param $value
     */
    public function prepend($value)
    {
        $obj = new SeparateNode($value);

        if ($this->head === null) {
            $this->head = $obj;
            $this->tail = $obj;
            return;
        }

        $this->head->setPrevious($obj);
        $obj->setNext($this->head);
        $this->head = $obj;
    }

    public function deleteFromHead()
    {
        if ($this->head === null) {
            throw new RuntimeException('List is empty');
        }

        $this->head = $this->head->getNext();
        $this->head->setPrevious(null);
    }

    /**
     * Delete from end using tail
     */
    public function deleteFromEnd()
    {
        if ($this->tail === null) {
            throw new RuntimeException('List is empty');
        }

        $this->tail = $this->tail->getPrevious();
        $this->tail->setNext(null);
    }

    /**
     * @param mixed $value
     * @param mixed $at
     * @throws RuntimeException
     */
    public function insertAfterAt($value, $at): void
    {
        $newNode = new SeparateNode($value);

        try {
            $node = $this->search($at);
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return;
        }

        $next = $node->getNext();
        if ($next !== null) {
            $next->setPrevious($newNode);
            $newNode->setNext($next);
            $newNode->setPrevious($node);
            $node->setNext($newNode);
        } else {
            $this->tail->setNext($newNode);
            $newNode->setPrevious($this->tail);
            $this->tail = $newNode;
        }
    }


    /**
     * @param mixed $value
     * @param mixed $at
     */
    public function insertBeforeAt($value, $at): void
    {
        $newNode = new SeparateNode($value);

        try {
            $node = $this->search($at);
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return;
        }

        $previous = $node->getPrevious();
        if ($previous !== null) {
            $previous->setNext($newNode);
            $newNode->setPrevious($previous);
            $newNode->setNext($node);
            $node->setPrevious($newNode);
        } else {
            $this->head->setPrevious($newNode);
            $newNode->setNext($this->head);
            $this->head = $newNode;
        }
    }

    /**
     * Delete node with given value
     * @param $value
     */
    public function deleteAt($value)
    {
        $node = $this->search($value);

        $previous = $node->getPrevious();
        $next = $node->getNext();

        if ($previous !== null && $next !== null) {
            $previous->setNext($next);
            $next->setPrevious($previous);
        }

        if ($previous === null) {
            $next->setPrevious(null);
            $this->head = $next;
        }

        if ($next === null) {
            $previous->setNext(null);
            $this->tail = $previous;
        }
    }

    /**
     * @param $value
     * @return SeparateNode
     * @throws RuntimeException
     */
    public function search($value): SeparateNode
    {
        if ($this->head === null) {
            throw new RuntimeException('List is empty');
        }

        $node = $this->head;

        while ($node !== null && $node->getValue() !== $value) {
            $node = $node->getNext();
        }

        if ($node === null) {
            throw new RuntimeException('Element not found');
        }

        return $node;
    }
}