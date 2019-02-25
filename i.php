<?php

class BinaryNode
{

    private $value;

    /** @var BinaryNode */
    private $left = null;

    /** @var BinaryNode */
    private $right = null;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return BinaryNode|null
     */
    public function getLeft(): ?BinaryNode
    {
        return $this->left;
    }

    /**
     * @param BinaryNode $left
     */
    public function setLeft(BinaryNode $left): void
    {
        $this->left = $left;
    }

    /**
     * @return BinaryNode|null
     */
    public function getRight(): ?BinaryNode
    {
        return $this->right;
    }

    /**
     * @param BinaryNode $right
     */
    public function setRight(BinaryNode $right): void
    {
        $this->right = $right;
    }


}

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
     */
    public function insert($value)
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
     * @return $this
     */
    private function insertNode(BinaryNode $node, BinaryNode $subtree)
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

    public function getDeepestLeaf()
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Binary tree is empty');
        }

        $this->getDeepestLeafNode($this->getRoot());
    }

    private function getDeepestLeafNode(BinaryNode $subtree): int
    {
        $level = $this->getLevel();
        if ($subtree->getLeft()) {
            $this->getDeepestLeafNode($subtree->getLeft());
            $this->setLevel($level++);
        } elseif ($subtree->getRight()) {
            $this->getDeepestLeafNode($subtree->getRight());
            $this->setLevel($level++);
        }
        return $this->getLevel();
    }
}

$binaryTree = new BinaryTree();
$binaryTree->insert(5);
$binaryTree->insert(7);
$binaryTree->insert(2);
$binaryTree->insert(3);
$binaryTree->insert(1);
$binaryTree->insert(9);
$binaryTree->insert(13);
$binaryTree->insert(11);
$binaryTree->insert(8);

$df = $binaryTree->getDeepestLeaf();

print_r($binaryTree);
print_r($df);
