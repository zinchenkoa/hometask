<?php

require_once __DIR__ . '/src/BinaryTree.php';

$binaryTree = new BinaryTree();

try {
    $binaryTree->insert(5);
    $binaryTree->insert(7);
    $binaryTree->insert(2);
    $binaryTree->insert(3);
    $binaryTree->insert(1);
    $binaryTree->insert(9);
    $binaryTree->insert(13);
    $binaryTree->insert(11);
    $binaryTree->insert('Value');
} catch (RuntimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    echo $binaryTree->getDeepestLeaf() . PHP_EOL;
} catch (RuntimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}


