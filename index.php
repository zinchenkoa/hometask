<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/ColisionResolvers/CollisionResolverInterface.php';
require_once __DIR__.'/ColisionResolvers/CollisionResolverPlus1.php';
require_once __DIR__.'/HashFunction.php';
require_once __DIR__.'/HashTable.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new CollisionResolverPlus1());

$string1 = "Ada";
$string2 = "adA";
$string3 = "aAd";
$string4 = "String";

$hashFunction = new HashFunction($string1, $hashTableLength);
$hashTable->write($hashFunction(), $string1);

$hashFunction = new HashFunction($string2, $hashTableLength);
$hashTable->write($hashFunction(), $string2);

$hashFunction = new HashFunction($string3, $hashTableLength);
$hashTable->write($hashFunction(), $string3);

$hashFunction = new HashFunction($string4, $hashTableLength);
$hashTable->write($hashFunction(), $string4);

$hashFunction = new HashFunction($string1, $hashTableLength);
$hash1 = $hashTable->get($hashFunction(), $string1);
//
$hashFunction = new HashFunction($string2, $hashTableLength);
$hash2 = $hashTable->get($hashFunction(), $string2);

$hashFunction = new HashFunction($string3, $hashTableLength);
$hash3 = $hashTable->get($hashFunction(), $string3);
//
$hashFunction = new HashFunction($string4, $hashTableLength);
$hash4 = $hashTable->get($hashFunction(), $string4);

var_dump($hashTable);

print_r($hash1);
print_r($hash2);
print_r($hash3);
print_r($hash4);