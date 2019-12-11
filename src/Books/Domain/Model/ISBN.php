<?php

namespace Books\Domain\Model;

class ISBN
{
    private $isbn;

    public function __construct($isbn)
    {
        $this->isbn = $isbn;
    }
}