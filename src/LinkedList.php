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
     * @return int
     */
    public function toInt(): int
    {

        if ($this->head !== null) {
            $number = '';
            $lastNode = $this->tail;

            while ($lastNode->getPrevious() !== null) {
                $number .= $lastNode->getValue();
                $lastNode = $lastNode->getPrevious();
            }
            $number .= $this->head->getValue();
        } else {
            throw new RuntimeException('One of the lists is empty');
        }

        return (int) $number;
    }

}