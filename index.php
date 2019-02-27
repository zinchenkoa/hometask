<?php

require_once __DIR__.'/ColisionResolvers/CollisionResolverInterface.php';
require_once __DIR__.'/ColisionResolvers/CollisionResolverPlus1.php';
require_once __DIR__.'/HashFunction.php';
require_once __DIR__.'/HashTable.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new CollisionResolverPlus1());

$string = "Ada";

$hashFunction = new HashFunction($string, $hashTableLength);

$hashTable->write($hashFunction(), $string);
//$hashTable->write($hashFunction->__invoke(), "daA");
//$hashTable->write($hashFunction->__invoke(), "aAd");

$hashTable->get($hashFunction->__invoke(), $string);

var_dump($hashTable);