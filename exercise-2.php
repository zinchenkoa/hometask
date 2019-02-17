<?php

class CustomStack
{
    /**
     * @var SplQueue
     */
    private $queue;

    public function __construct()
    {
        $this->queue = new SplQueue();
    }

    /**
     * @param mixed $value
     */
    public function push($value): void
    {
        $this->queue->enqueue($value);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        $total = $this->queue->count();

        $newQueue = new SplQueue();

        // Put N-1 elements to new queue
        for($i = 1; $i < $total; $i++) {
            $newQueue->enqueue($this->queue->dequeue());
        }

        $lastElement = $this->queue->dequeue();

        // Replace original queue with new queue
        $this->queue = $newQueue;

        return $lastElement;
    }
}

$a = new CustomStack();

$a->push(11);
$a->push(22);
$a->push(33);
$a->push(44);

echo $a->pop().PHP_EOL;

$a->push(55);
$a->push(66);

echo $a->pop().PHP_EOL;
echo $a->pop().PHP_EOL;
echo $a->pop().PHP_EOL;