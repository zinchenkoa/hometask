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
    public function append($value)
    {
        $obj = new SeparateNode();
        $obj->setValue($value);

        if ($this->tail !== null && $this->head !== null) {
            $previous = $this->tail->getPrevious();
            if ($previous === null) {
                $oldTail = $this->tail;
                $this->tail = $obj;
                $this->tail->setPrevious($oldTail);
            } else {
                $oldTail = $this->tail;
                $previous->setNext($oldTail);
                $oldTail->setPrevious($previous);
                $oldTail->setNext($obj);
                $this->tail = $obj;
                $this->tail->setPrevious($oldTail);
            }
        } else {
            $this->tail = $obj;
            $this->head = $obj;
        }
    }

    /**
     * Prepend using head
     * @param $value
     */
    public function prepend($value)
    {
        $obj = new SeparateNode();
        $obj->setValue($value);

        $headObj = $this->head;
        $obj->setNext($headObj);
        $this->head = $obj;
    }

    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }
        $this->head = $this->head->getNext();
    }

    /**
     * Delete from end using tail
     */
    public function deleteFromEnd()
    {
        if (empty($this->tail)) {
            throw new RuntimeException('Notice');
        }

        $this->tail = $this->tail->getPrevious() ?? null;

    }

    public function insertAfterAt($value, $at)
    {

        $newElement = new SeparateNode();
        $newElement->setValue($value);


        if($this->head !== null) { //
            /** @var SeparateNode $lastElement */
            $lastElement = $this->head;

            while ($lastElement->getValue() !== $at) {
                $lastElement = $lastElement->getNext();
            }
            $lastElement->setNext($newElement);
        } else {
            throw new RuntimeException("Can't insert $value after $at");
        }
    }

    public function insertBeforeAt($value, $at)
    {


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