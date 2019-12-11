<?php

namespace Books\Domain\Model;

class ISBN
{
    private $isbn;

    public function __construct($isbn)
    {
        $this->isbn = $isbn;
    }

    public function isbn()
    {
        return $this->isbn;
    }

    public function __toString()
    {
        return $this->isbn;
    }
}