<?php

declare(strict_types=1);

namespace Books\Domain\Model;

interface BookRepository
{
    public function add(Book $book);
    public function findByISBN(ISBN $isbn);
}
