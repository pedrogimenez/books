<?php

declare(strict_types=1);

use Books\Domain\Model\ISBN;
use Books\Domain\Model\Book;
use Books\Infrastructure\Persistence\Doctrine\DoctrineBookRepository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\Tools\SchemaTool;

class DoctrineBookRepositoryTest extends KernelTestCase
{
    private $em;

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $tool = new SchemaTool($this->em);
        $tool->createSchema([$this->em->getClassMetadata('Books\Domain\Model\Book')]);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }

    /** @test */
    public function itFindsABookByISBN()
    {
        $bookRepository = new DoctrineBookRepository($this->em);
        $isbn = new ISBN('9780872203495');
        $book = new Book($isbn, 'irrelevant', 'irrelevant');

        $bookRepository->add($book);

        $bookFound = $bookRepository->findByISBN($book->isbn());
        $this->assertNotNull($bookFound);
    }

    /** @test */
    public function itFindsAllBooks()
    {
        $bookRepository = new DoctrineBookRepository($this->em);
        $isbn = new ISBN('9780872203495');
        $book = new Book($isbn, 'irrelevant', 'irrelevant');
        $anotherIsbn = new ISBN('0132350882');
        $anotherBook = new Book($anotherIsbn, 'irrelevant', 'irrelevant');

        $bookRepository->add($book);
        $bookRepository->add($anotherBook);

        $booksFound = $bookRepository->findAll();
        $this->assertEquals($booksFound, [$book, $anotherBook]);
    }
}
