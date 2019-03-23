<?php

namespace App;

/**
 * Class User
 * @package App
 */
class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
