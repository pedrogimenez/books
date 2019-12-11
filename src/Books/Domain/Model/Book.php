<?php

namespace Books\Domain\Model;

class Book
{
    private $isbn;
    private $title;
    private $description;

    public function __construct(ISBN $isbn, $title, $description)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
    }
}