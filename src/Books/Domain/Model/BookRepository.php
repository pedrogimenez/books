<?php

namespace Books\Domain\Model;

interface BookRepository
{
    public function add(Book $book);
}
