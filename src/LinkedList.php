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

        if (!empty($this->tail)) {
            $obj->setPrevious($this->tail);

            /** @var SeparateNode $prevObj */
            $prevObj = $obj->getPrevious();
            $prevObj->setNext($obj);
        }

        $this->tail = $obj;
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


        if(!empty($this->head)) { //
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
//     * Append using head
//     * @param $value
//     */
//    public function append($value)
//    {
//        $newElement = new SeparateNode();
//        $newElement->setValue($value);
//        if(!empty($this->head)) {
//            /** @var SeparateNode $lastElement */
//            $lastElement = $this->head;
//            // O(n)
//            while (!empty($lastElement->getNext())) {
//                $lastElement = $lastElement->getNext();
//            }
//            $lastElement->setNext($newElement);
//        } else {
//            $this->head = $newElement;
//        }
//    }

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