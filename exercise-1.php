<?php

class CustomQueue
{
    /**
     * @var SplQueue
     */
    private $inbox;

    /**
     * @var SplQueue
     */
    private $outbox;

    public function __construct()
    {
        $this->inbox = new SplStack();
        $this->outbox = new SplStack();
    }

    /**
     * @param mixed $value
     */
    public function enqueue($value): void
    {
        $this->inbox->push($value);
    }

    /**
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->outbox->isEmpty()) {
            // Refill outbox if empty
            $total = $this->inbox->count();
            for($i = 0; $i < $total; $i++) {
                $this->outbox->push($this->inbox->pop());
            }
        }
        return $this->outbox->pop();
    }
}


$a = new CustomQueue();

$a->enqueue(11);
$a->enqueue(22);
$a->enqueue(33);
$a->enqueue(44);

echo $a->dequeue().PHP_EOL;

$a->enqueue(55);
$a->enqueue(66);

echo $a->dequeue().PHP_EOL;
echo $a->dequeue().PHP_EOL;