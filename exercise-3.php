<?php


//$input = '{[]}}';
$input = '{[(])}';

class SequenceChecker
{
    const BRACES = [
        '}' => '{',
        ')' => '(',
        ']' => '[',
        '>' => '<',
        '{' => '}',
        '(' => ')',
        '[' => ']',
        '<' => '>',
    ];

    const OPENING_BRACES = [
        '{',
        '(',
        '[',
        '<',
    ];

    public function run(string $input): bool
    {
        if (!$this->checkOpenBrace($input)) {
            return false;
        }

        $stack = [];
        $length = strlen($input);

        for ($i = 0; $i < $length; $i++) {
            $this->processElement($input{$i}, $stack);
        }

        return empty($stack);

    }

    private function checkOpenBrace(string $string): bool
    {
        return in_array($string{0}, self::OPENING_BRACES);
    }

    private function processElement(string $current, &$stack): void
    {
        $prev = end($stack);
        if ($this->checkOpposite($current, $prev)) {
            array_pop($stack);
        } else {
            $stack[] = $current;
        }
    }

    private function checkOpposite(string $current, string $prev): bool
    {
        return array_key_exists($prev, self::BRACES) && self::BRACES[$prev] === $current;
    }
}

$obj = new SequenceChecker();
$result = $obj->run($input);
var_dump($result);
