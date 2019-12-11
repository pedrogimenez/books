<?php

namespace Books\Infrastructure\Persistence\Doctrine;

use Books\Domain\Model\Book;
use Books\Domain\Model\BookRepository;

use Doctrine\ORM\EntityManager;

class DoctrineBookRepository implements BookRepository
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function add(Book $book)
    {
        // TODO: Implement add() method.
    }
}