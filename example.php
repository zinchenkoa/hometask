<?php
require_once __DIR__ . '/src/LinkedList.php';

$linkedList = new LinkedList();
$linkedList->append('new item1');
$linkedList->append('new item2');
$linkedList->append('new item3');
$linkedList->deleteFromEnd();
$linkedList->append('new item4');
$linkedList->append('new item5');
$linkedList->append('new item6');
$linkedList->deleteAt('new item5');
$linkedList->prepend('new item0');
$linkedList->insertAfterAt('new item1.5', 'new item1');
$linkedList->insertBeforeAt('new item0.5', 'new item1');
$linkedList->deleteAt('new item4');

print_r($linkedList);