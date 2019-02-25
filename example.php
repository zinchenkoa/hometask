<?php
require_once __DIR__ . '/src/LinkedList.php';

$linkedList = new LinkedList();
$linkedList->append("new item1");
$linkedList->append("new item2");
$linkedList->append("new item3");
$linkedList->append("new item4");

$linkedList->deleteFromEnd();
print_r($linkedList);