<?php
require_once __DIR__ . '/LinkedList.php';

class LinkedListOperations
{
    /**
     * @param LinkedList $linkedList1
     * @param LinkedList $linkedList2
     * @return LinkedList
     */
    public function sum(LinkedList $linkedList1, LinkedList $linkedList2): LinkedList
    {

        $sum = (string) ($linkedList1->toInt() + $linkedList2->toInt());
        $newLinkedList = new LinkedList();

        for ($i = 0, $length = strlen($sum); $i < $length; $i++) {
            $newLinkedList->append($sum{$i});
        }
        return $newLinkedList;
    }
}