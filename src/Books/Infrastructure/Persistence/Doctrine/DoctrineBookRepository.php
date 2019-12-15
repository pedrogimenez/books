<?php

declare(strict_types=1);

namespace Books\Infrastructure\Persistence\Doctrine;

use Books\Domain\Model\Book;
use Books\Domain\Model\BookRepository;
use Books\Domain\Model\ISBN;

use Doctrine\ORM\EntityManagerInterface;

class DoctrineBookRepository implements BookRepository
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findByISBN(ISBN $isbn)
    {
        return $this->em->find('Books\Domain\Model\Book', $isbn->isbn());
    }

    public function add(Book $book)
    {
        $this->em->persist($book);
        $this->em->flush();
    }
}