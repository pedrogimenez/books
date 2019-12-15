<?php

declare(strict_types=1);

namespace Books\Application;

use Books\Domain\Model\BookRepository;

class ListBooksService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function execute()
    {
        $books = $this->bookRepository->findAll();

        return array_map(function ($book) { return new BookDTO($book); }, $books);
    }
}