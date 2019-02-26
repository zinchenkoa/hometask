<?php

require_once __DIR__ . '/BinaryNode.php';

class BinaryTree
{
    /** @var BinaryNode */
    private $root = null;

    private $level = 0;

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->root === null;
    }

    /**
     * @return BinaryNode
     */
    public function getRoot(): BinaryNode
    {
        return $this->root;
    }

    /**
     * @param BinaryNode $root
     */
    public function setRoot(BinaryNode $root): void
    {
        $this->root = $root;
    }


    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @param mixed $value
     * @throws RuntimeException
     */
    public function insert($value): void
    {
        if (!is_int($value)) {
            throw new RuntimeException('Only integers are allowed');
        }

        $node = new BinaryNode($value);
        if ($this->isEmpty()) {
            $this->setRoot($node);
        } else {
            $this->insertNode($node, $this->getRoot());
        }
    }

    /**
     * @param BinaryNode $node
     * @param BinaryNode $subtree
     * @return BinaryTree
     */
    private function insertNode(BinaryNode $node, BinaryNode $subtree): BinaryTree
    {
        if ($subtree->getValue() > $node->getValue()) {
            $subtree->getLeft()
                ? $this->insertNode($node, $subtree->getLeft())
                : $subtree->setLeft($node);
        } elseif ($subtree->getValue() < $node->getValue()) {
            $subtree->getRight()
                ? $this->insertNode($node, $subtree->getRight())
                : $subtree->setRight($node);
        }
        return $this;
    }

    /**
     * @return int
     * @throws RuntimeException
     */
    public function getDeepestLeaf(): int
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Binary tree is empty');
        }

        $this->getDeepestLeafNode($this->getRoot());
        return $this->level;
    }

    /**
     * @param BinaryNode $subtree
     * @param int $depth
     */
    private function getDeepestLeafNode(BinaryNode $subtree, int $depth = 1): void
    {
        if ($this->level < $depth) {
            $this->level = $depth;
        }
        if ($subtree->getLeft()) {
            $this->getDeepestLeafNode($subtree->getLeft(), $depth + 1);
        }
        if ($subtree->getRight()) {
            $this->getDeepestLeafNode($subtree->getRight(), $depth + 1);
        }
    }
}
