<?php

declare(strict_types=1);

namespace Books\Application;

use Books\Domain\Model\Book;

class BookDTO
{
    private $isbn;
    private $title;
    private $description;

    public function __construct(Book $book)
    {
        $this->isbn = $book->isbn()->isbn();
        $this->title = $book->title();
        $this->description = $book->description();
    }

    public function isbn()
    {
        return $this->isbn;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function toJSON()
    {
        return [
            "isbn" => $this->isbn,
            "title" => $this->title,
            "description" => $this->description
        ];
    }
}