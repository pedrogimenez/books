<?php

declare(strict_types=1);

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

    public function execute(CreateBookRequest $request)
    {
        $book = new Book(new ISBN($request->isbn()), $request->title(), $request->description());

        $this->bookRepository->add($book);

        return new BookDTO($book);
    }
}