<?php
require_once __DIR__ . '/src/LinkedList.php';
require_once __DIR__ . '/src/LinkedListOperations.php';

$linkedList1 = new LinkedList();
$linkedList1->append('4');
$linkedList1->append('7');
$linkedList1->append('6');
$linkedList1->append('1');
//$linkedList1->append('Not valid');

$linkedList2 = new LinkedList();
$linkedList2->append('3');
$linkedList2->append('4');
$linkedList2->append('1');

$linkedListOperations = new LinkedListOperations();

$newLinkedList = $linkedListOperations->sum($linkedList1, $linkedList2);
print_r($newLinkedList);

