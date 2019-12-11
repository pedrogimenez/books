<?php

namespace Books\Application;

use Books\Domain\Model\Book;
use Books\Domain\Model\ISBN;
use Books\Domain\Model\BookRepository;

class CreateBookService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute()
    {
        $book = new Book(new ISBN('irrelevant isbn'), 'irrelevant title', 'irrelevant description');

        $this->bookRepository->add($book);

        return $book;
    }
}