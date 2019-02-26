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

        if ($this->head === null) {
            throw new RuntimeException('List is empty');
        }

        $atElement = $this->head;

        while ($atElement->getValue() !== $at) {
            $atElement = $atElement->getNext();
        }

        if ($atElement === null) {
            throw new RuntimeException('Element not found');
        }

        $next = $atElement->getNext();
        if ($next !== null) {
            $next->setPrevious($newNode);
            $newNode->setNext($next);
            $newNode->setPrevious($atElement);
            $atElement->setNext($newNode);
        } else {
            $this->tail->setNext($newNode);
            $newNode->setPrevious($this->tail);
            $this->tail = $newNode;
        }
    }


    /**
     * @param mixed $value
     * @param mixed $at
     * @throws RuntimeException
     */
    public function insertBeforeAt($value, $at): void
    {
        $newNode = new SeparateNode($value);

        if ($this->head === null) {
            throw new RuntimeException('List is empty');
        }

        $atElement = $this->head;

        while ($atElement->getValue() !== $at) {
            $atElement = $atElement->getNext();
        }

        if ($atElement === null) {
            throw new RuntimeException('Element not found');
        }

        $previous = $atElement->getPrevious();
        if ($previous !== null) {
            $previous->setNext($newNode);
            $newNode->setPrevious($previous);
            $newNode->setNext($atElement);
            $atElement->setPrevious($newNode);
        } else {
            $this->head->setPrevious($newNode);
            $newNode->setNext($this->head);
            $this->head = $newNode;
        }
    }

    public function deleteAt($value, $at)
    {

    }

    public function search()
    {

    }
//    /**
//     * Delete from end using head
//     * @param $value
//     */
//    public function deleteFromEnd()
//    {
//
//        if (!empty($this->head)) {
//            /** @var SeparateNode $lastElement */
//            $lastElement = $this->head;
//            $prev = null;
//
//            // O(n)
//            while (!empty($lastElement->getNext())) {
//                $prev = $lastElement;
//                $lastElement = $lastElement->getNext();
//            } // end of the list
//
//            $prev->setNext(null);
//        } else {
//            throw new RuntimeException('Notice');
//        }
//    }
}